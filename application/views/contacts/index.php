<p>This is the contact home page check it out y'alll</p>
<table>
	<?php foreach($contact_list as $contact){ ?>
	<tr>
		<td><?php echo $contact['ID']; ?></td>
		<td><?php echo $contact['Name_First'] . ' ' . $contact['Name_Last']; ?></td>
		<td><?php echo $contact['Contact_Email']; ?></td>
		<td><a href="edit/<?php echo $contact['ID']; ?>">Edit</a></td>
		<td><a href="./delete/<?php echo $contact['ID']; ?>">Delete</a></td>
	</tr>
	<?php } ?>
</table>

<br />
<br />
<a href="/contacts/add">Add a contact</a>

<br />

 <center>  
        <a href="http://www.yensdesign.com"><img src="logo.jpg" alt="Go to yensdesign.com"/></a>  
        <div id="button"><input type="submit" value="Press me please!" /></div>  
    </center>  
    <div id="popupContact">  
        <a id="popupContactClose">x</a>  
        <h1>Title of our cool popup, yay!</h1>  
        <p id="contactArea">  
            Here we have a simple but interesting sample of our new stuning and smooth popup. As you can see jQuery and CSS does it easy...  
            <br/><br/>  
            We can use it for popup-forms and more... just experiment!  
            <br/><br/>  
            Press ESCAPE, Click on X (right-top) or Click Out from the popup to close the popup!  
            <br/><br/>  
            <a href="http://www.yensdesign.com"><img src="logo.jpg" alt="Go to yensdesign.com"/></a>  
        </p>  
    </div>  
    <div id="backgroundPopup"></div>  
