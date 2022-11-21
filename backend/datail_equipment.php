<?php
	$sql = "SELECT COUNT(r.eq_id)  AS count_eq, e.eq_name FROM tb_repair AS r
INNER JOIN tb_equipment AS e ON r.eq_id = e.eq_id
GROUP BY e.eq_name ORDER BY r.r_save ASC";	
	$query = mysqli_query($conn, $sql);
?>
<table id="table2" width="100%" class="table table-hover">
                                	<thead>
                                    	<tr class="bg-green">
                                        	<th width="5%" class="text-center">ลำดับ</th>
                                            <th width="85%">ประเภทอุปกรณ์</th>
                                            <th width="10%" class="text-center">จำนวน</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										$i = 1;
										while($rows = mysqli_fetch_array($query)) {
									?>
                                    	<tr>
                                        	<td><?php echo $i;?></td>
                                       		<td><?php echo $rows['eq_name'];?></td>
                                            <td><span class="badge badge bg-red"><?php echo $rows['count_eq'];?></span></td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
</table>