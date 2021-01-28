<?php 

require("config.php");


$sql="select * from users order by id desc";
$res=mysqli_query($conn,$sql);



?>
   <h1><button><a href="create.php" style="text-decoration: none;">Add Users</a></button></h1>
   <br><br>    
 <table>
                      <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(mysqli_num_rows($res)>0){
					
						while($row=mysqli_fetch_assoc($res)){
						?>
						<tr style="text-align: center;">
							<td><?php echo $row['name']?></td>
							<td><img src="upload/<?php echo $row['image']?>" width="20%"></td>
							
							<td>
								<button ><a href="edit.php?id=<?php echo $row['id']?>" style="text-decoration: none" ><label>Edit</label></a></button>&nbsp;
							</td>
                           
                        </tr>
                        <?php 
					
						} } else { ?>
						<tr>
							<td colspan="5">No data found</td>
						</tr>
						<?php } ?>
                      </tbody>
                    </table>