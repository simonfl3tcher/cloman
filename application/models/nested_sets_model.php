<?php 
	

	class Nested_Sets_Model extends CI_Model {


		public function get_nested_set($id){
			$sql = "SELECT node.*, (count(parent.name) - (sub_tree.depth + 1)) as depth 
from tasks as node, tasks as parent, tasks as sub_parent, (
select node.name, (count(parent.name) - 1) as depth from tasks as node, tasks as parent where node.lft between parent.lft and parent.rgt and node.task_id = ?
group by node.name
order by node.lft) as sub_tree
where node.lft between parent.lft and parent.rgt
and node.lft between sub_parent.lft and sub_parent.rgt and sub_parent.name = sub_tree.name 
group by node.name 
having depth >= 1
order by node.lft";
			$query = $this->db->query($sql, array($id));
			return $query->result_array();
		}

		public function get_tasks_for_projects($projectid, $json = false){
			$sql = "SELECT node.*, (count(parent.name) - (sub_tree.depth + 1)) as depth 
from tasks as node, tasks as parent, tasks as sub_parent, (
select node.name, (count(parent.name) - 1) as depth from tasks as node, tasks as parent where node.lft between parent.lft and parent.rgt and node.task_id = (select task_id from tasks where project_id = ? order by task_id asc limit 1)
group by node.name
order by node.lft) as sub_tree
where node.lft between parent.lft and parent.rgt
and node.lft between sub_parent.lft and sub_parent.rgt and sub_parent.name = sub_tree.name 
and node.complete = 'N'
group by node.name 
order by node.lft";
			$query = $this->db->query($sql, array($projectid));
			if($json){
				return json_encode($query->result_array());
			} else {
				return $query->result_array();
			}
		}

		public function insert_node($parentId = null, $type){
			if($parentId != null){
				$sql = "lock table tasks write";
				$result = $this->db->query($sql);

				$sql = "select @myLeft := lft from tasks where task_id = ?";
				$result = $this->db->query($sql, array($parentId));

				$sql = "update tasks set rgt = rgt + 2 where rgt > @myLeft";
				$result = $this->db->query($sql);

				$sql = "update tasks set lft = lft + 2 where lft > @myLeft";
				$result = $this->db->query($sql);
				
				$sql = "insert into tasks(lft, rgt, parent_task_id, business_id, project_id, task_type_id, status_id, start_date, internal_deadline, client_deadline, name, notes, task_created_by) values (@myLeft+1, @myLeft+2, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
				$query = $this->db->query($sql, 
				array(
					$parentId,
					isset($_POST['task']['Business']) ? $_POST['task']['Business'] : 0, 
					isset($_POST['task']['Project']) ? $_POST['task']['Project'] : 0, 
					$type, 
					isset($_POST['task']['Status']) ? $_POST['task']['Status'] : null, 
					isset($_POST['task']['Startdate']) ? date('Y-m-d', strtotime($_POST['task']['Startdate'])) : '', 
					isset($_POST['task']['internal-end-date']) ? date('Y-m-d', strtotime($_POST['task']['internal-end-date'])) : '', 
					isset($_POST['task']['external-end-date']) ? date('Y-m-d', strtotime($_POST['task']['external-end-date'])) : '', 
					isset($_POST['task']['Name']) ? $_POST['task']['Name'] : '', 
					isset($_POST['task']['Notes']) ? $_POST['task']['Notes'] : '', 
					$this->session->userdata('user_id'),
					isset($_POST['task']['StatusNotes']) ? $_POST['task']['StatusNotes'] : ''

				));

				$insertId = $this->db->insert_id();

				$sql = "unlock tables";
				$result = $this->db->query($sql);
				return $insertId;
			} else {
				$sql = "lock table tasks write";
				$result = $this->db->query($sql);

				$sql = "select @myRight := rgt from tasks where task_id = 38";
				$result = $this->db->query($sql);

				$sql = "update tasks set rgt = rgt + 2 where rgt > @myRight";
				$result = $this->db->query($sql);
				
				$sql = "update tasks set lft = lft + 2 where lft > @myRight";
				$result = $this->db->query($sql);

				$sql = "insert into tasks (lft, rgt, business_id, project_id, task_type_id, status_id, start_date, internal_deadline, client_deadline, name, notes, task_created_by, status_notes) 
values (@myRight+1, @myRight+2, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

				$query = $this->db->query($sql, 
				array(
					isset($_POST['task']['Business']) ? $_POST['task']['Business'] : 0, 
					isset($_POST['task']['Project']) ? $_POST['task']['Project'] : 0, 
					$type, 
					isset($_POST['task']['Status']) ? $_POST['task']['Status'] : null, 
					isset($_POST['task']['Startdate']) ? date('Y-m-d', strtotime($_POST['task']['Startdate'])) : '', 
					isset($_POST['task']['internal-end-date']) ? date('Y-m-d', strtotime($_POST['task']['internal-end-date'])) : '', 
					isset($_POST['task']['external-end-date']) ? date('Y-m-d', strtotime($_POST['task']['external-end-date'])) : '', 
					isset($_POST['task']['Name']) ? $_POST['task']['Name'] : '', 
					isset($_POST['task']['Notes']) ? $_POST['task']['Notes'] : '', 
					$this->session->userdata('user_id'),
					isset($_POST['task']['StatusNotes']) ? $_POST['task']['StatusNotes'] : ''
				));

				$insertId = $this->db->insert_id();

				$sql = "unlock tables";
				$result = $this->db->query($sql);
				return $insertId;
			return $this->db->insert_id();
			}
		}

		public function delete_node($taskId){
			$sql = "lock table tasks write; 
select @myLeft := lft, @myRight := rgt, @myWidth := rgt - lft +1
from tasks 
where task_id = ?;
delete from tasks where lft between @myLeft and @myRight;
update tasks set rgt = rgt - @myWidth where rgt >  @myRight;
update tasks set lft = lft - @myWidth where lft > @myRight;
unlock tables;";
			$query = $this->db->query($sql, array($taskId));
			return $query->result_array();
		}

	}

?>