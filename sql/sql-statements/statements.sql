
-- Bellow statement is used to get the depth of the children of the sub tree.
-- It is done in such a complex way to allow to get the sub tree at any depth.  - To change it so you don't get the 
select node.name, (count(parent.name) - (sub_tree.depth + 1)) as depth 
from nested_table as node, nested_table as parent, nested_table as sub_parent, (
select node.name, (count(parent.name) - 1) as depth from nested_table as node, nested_table as parent where node.lft between parent.lft and parent.rgt and node.name = 'Eletronics'
group by node.name
order by node.lft) as sub_tree
where node.lft between parent.lft and parent.rgt
and node.lft between sub_parent.lft and sub_parent.rgt and sub_parent.name = sub_tree.name group by node.name order by node.lft

-- The statement bellow puts a space in where it is needed

select concat(repeat(' ', count(parent.name)-1), node.name) as name from nested_table as node, nested_table as parent
where node.lft between parent.lft and parent.rgt
group by node.name
order by node.lft

-- Bellow statement is used to add a new top level node. -- 

lock table nested_table write;

select @myRight := rgt from nested_table where name = 'Televisions';

update nested_table set rgt = rgt + 2 where rgt > @myRight;
update nested_table set lft = lft + 2 where lft > @myRight;

insert into nested_table(name, lft, rgt) values ('Game Console', @myRight +1, @myRight+2);

unlock tables;


-- Bellow statement is used to add a child node to a category --
lock table nested_table write;

select @myLeft := lft from nested_table where name = 'Game Console';

update nested_table set rgt = rgt + 2 where rgt > @myLeft;
update nested_table set lft = lft + 2 where lft > @myLeft;

insert into nested_table(name, lft, rgt) values ('Fiffa', @myLeft+1, @myLeft+2);

unlock tables;

-- Bellow is used to delete a node, it deletes nodes which are leafs and nodes that do not have children. --
lock table nested_table write; 

select @myLeft := lft, @myRight := rgt, @myWidth := rgt - lft +1
from nested_table 
where name = 'Fiffa';

delete from nested_table where lft between @myLeft and @myRight;

update nested_table set rgt = rgt - @myWidth where rgt >  @myRight;
update nested_table set lft = lft - @myWidth where lft > @myRight;

unlock tables;

-- Bellow deletes a node and puts all its children into the above category 

lock table nested_table write;
select @myLeft := lft, @myRight := rgt, @myWidth := rgt - lft +1
from nested_table where name = 'PUT THE NAME OR PRODUCT ID IN HERE'

Delete from nested_table where lft = @myLeft;
update nested_table set rgt = rgt - 1, lft = lft -1 where lft between @myLeft and @myRight;
update nested_table set rgt = rgt - 2 where rgt > @myRight;
update nested_table set lft = lft - 2 where lft  > @myRight;

unlock table;
