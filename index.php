<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-3">
        <h2>Employee Lists</h2>
        <button class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnAdd">Add Employee</button>
        <table class="table text-center align-middle mt-5" style="table-layout: fixed;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Sex</th>
                    <th>Position</th>
                    <th>Salary</th>
                    <th>Address</th>
                    <th>Profile</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?php 
                    include 'connection.php';
                    global $connection;
                    $select="SELECT * FROM `tbemployees`";
                    $result=$connection->query($select);
                    while($row=$result->fetch_assoc()){
                        echo '<tr>
                                    <td>'.$row['emp_id'].'</td>
                                    <td>'.$row['emp_name'].'</td>
                                    <td>'.$row['sex'].'</td>
                                    <td>'.$row['position'].'</td>
                                    <td>'.$row['salary'].'$</td>
                                    <td>'.$row['province'].'</td>
                                    <td><img class="rounded" width="80" src="./upload/'.$row['profile'].'" alt=""></td>
                                    <td>
                                        <button class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnEdit">Edit</button>
                                        <button class="btn btn-danger" data-id="'.$row['emp_id'].'" data-bs-toggle="modal" data-bs-target="#exampleModal1" id="btnDelete">Delete</button>
                                    </td>
                                </tr>';
                    }
                ?>
                
            </tbody>
        </table>
    </div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="hide_id" id="hide_id">
            <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="sex" class="form-label">Sex</label>
            <select name="sex" id="sex" class="form-select">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="position" class="form-label">Position</label>
            <select name="position" id="position" class="form-select">
                <option value="">-- Select Position --</option>
                <option value="frontend_developer">Frontend Developer</option>
                <option value="backend_developer">Backend Developer</option>
                <option value="fullstack_developer">Full Stack Developer</option>
                <option value="mobile_developer">Mobile App Developer</option>
                <option value="web_developer">Web Developer</option>
                <option value="software_engineer">Software Engineer</option>
            </select>
        </div>
        <div class="form-group">
            <label for="salary" class="form-label">Salary</label>
            <input type="text" name="salary" id="salary" class="form-control">
        </div>
        <div class="form-group">
            <label for="province" class="form-label">Province</label>
            <select name="province" id="province" class="form-select">
                <option value="">-- Select Province --</option>
                <option value="banteay_meanchey">Banteay Meanchey</option>
                <option value="battambang">Battambang</option>
                <option value="kampong_cham">Kampong Cham</option>
                <option value="kampong_chhnang">Kampong Chhnang</option>
                <option value="kampong_speu">Kampong Speu</option>
                <option value="kampong_thom">Kampong Thom</option>
                <option value="kampot">Kampot</option>
                <option value="kandal">Kandal</option>
                <option value="koh_kong">Koh Kong</option>
                <option value="kratie">Kratie</option>
                <option value="mondulkiri">Mondulkiri</option>
                <option value="phnom_penh">Phnom Penh (Capital)</option>
                <option value="preah_vihear">Preah Vihear</option>
                <option value="prey_veng">Prey Veng</option>
                <option value="pursat">Pursat</option>
                <option value="ratanakiri">Ratanakiri</option>
                <option value="siem_reap">Siem Reap</option>
                <option value="preah_sihanouk">Preah Sihanouk</option>
                <option value="stung_treng">Stung Treng</option>
                <option value="svay_rieng">Svay Rieng</option>
                <option value="takeo">Takeo</option>
                <option value="oddar_meanchey">Oddar Meanchey</option>
                <option value="kep">Kep</option>
                <option value="pailin">Pailin</option>
                <option value="tboung_khmum">Tboung Khmum</option>
            </select>
        </div>
        <div class="form-group">
            <label for="profile" class="form-label">Profile</label>
            <input type="file" name="profile" id="profile" class="form-control"> <br>
            <input type="hidden" name="hide_image" id="hide_image">
            <img style="cursor: pointer;" width="80" class="rounded-circle" id="image" src="https://blocks.astratic.com/img/user-img-small.png" alt="">
        </div>
        <div class="form-group mt-3">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-primary" data-bs-dismiss="modal" id="btnSave">Save</button>
            <button type="button" class="btn btn-success" data-bs-dismiss="modal" id="edit">Edit</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal delete -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Are you sure to delete this employee?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
            <input type="hidden" name="delete_id" id="delete_id">
            <div class="form-group">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="delete">Yes, delete it.</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script>
    $(document).ready(function(){
        $('#profile').hide();
        $('#image').click(function(){
            $('#profile').click();
        });
        $('#profile').change(function(){
            let formData=new FormData();
            let file=this.files[0];
            formData.append('profile',file);
            $.ajax({
                url:'moveFile.php',
                method:'post',
                data:formData,
                contentType:false,
                processData:false,
                cache:false,
                success:function(response){
                   $('#hide_image').val(response);
                   $('#image').attr('src','./upload/'+response);  
                }
            });
        });
        $('#btnAdd').click(function(){
            $('#btnSave').show();
            $('#edit').hide();
            $('#exampleModalLabel').html('Add Employee');
        })
        $('#btnSave').click(function(){
            const name=$('#name').val();
            const sex=$('#sex').val();
            const position=$('#position').val();
            const salary=$('#salary').val();
            const province=$('#province').val();
            const profile=$('#hide_image').val();
            $.ajax({
                url:'insert.php',
                method:'post',
                data:{
                    name:name,
                    sex:sex,
                    position:position,
                    salary:salary,
                    province:province,
                    profile:profile,
                },
                cache:false,
                success:function(response){
                    $('#tbody').append(`
                        <tr>
                            <td>${response}</td>
                            <td>${name}</td>
                            <td>${sex}</td>
                            <td>${position}</td>
                            <td>${salary}$</td>
                            <td>${province}</td>
                            <td><img class="rounded" width="80" src="./upload/${profile}" alt=""></td>
                            <td>
                                <button class="btn btn-warning me-1" data-bs-toggle="modal" data-bs-target="#exampleModal" id="btnEdit">Edit</button>
                                <button class="btn btn-danger" id="btnDelete" data-id="${response}" data-bs-toggle="modal" data-bs-target="#exampleModal1">Delete</button>
                            </td>
                        </tr>
                    `);
                }
            })
        })
        let row='';
        $(document).on('click','#btnEdit',function(){
            $('#btnSave').hide();
            $('#edit').show();
            $('#exampleModalLabel').html('Edit Employee');
            // get data from table
            row=$(this).parents('tr');
            const id=row.find('td').eq(0).text();
            const name=row.find('td').eq(1).text();
            const sex=row.find('td').eq(2).text();
            const position=row.find('td').eq(3).text();
            const salary=row.find('td').eq(4).text().split('$')[0];
            const address=row.find('td').eq(5).text();
            const image=row.find('img').attr('src').split('/').pop();
            // insert data into form
            $('#hide_id').val(id);
            $('#name').val(name);
            $('#sex').val(sex);
            $('#position').val(position);
            $('#salary').val(salary);
            $('#province').val(address);
            $('#hide_image').val(image);
            $('#image').attr('src','./upload/'+image);
            $('#edit').click(function(){
                // get data from form
                const f_id=$('#hide_id').val();
                const f_name=$('#name').val();
                const f_sex=$('#sex').val();
                const f_position=$('#position').val();
                const f_salary=$('#salary').val();
                const f_province=$('#province').val();
                const f_image=$('#hide_image').val();
                $.ajax({
                    url:'update.php',
                    method:'post',
                    data:{
                        id:f_id,
                        name:f_name,
                        sex:f_sex,
                        position:f_position,
                        salary:f_salary,
                        province:f_province,
                        profile:f_image,
                    },
                    cache:false,
                    success:function(res){
                        if(res=='Success'){
                            row.find('td').eq(0).text(f_id);
                            row.find('td').eq(1).text(f_name);
                            row.find('td').eq(2).text(f_sex);
                            row.find('td').eq(3).text(f_position);
                            row.find('td').eq(4).text(f_salary+'$');
                            row.find('td').eq(5).text(f_province);
                            row.find('img').attr('src','./upload/'+f_image);
                        }
                    }
                });
            });
           
            
        })
        // delete
        $(document).on('click','#btnDelete',function(){
            const id=$(this).attr('data-id');
            $('#delete_id').val(id);
            row=$(this).parents('tr');
            $('#delete').click(function(){
                let delete_id= $('#delete_id').val();
                $.ajax({
                    url:'delete.php',
                    method:'post',
                    data:{
                        id:delete_id
                    },
                    cache:false,
                    success:function(res){
                        if(res=='Success'){
                            row.remove();
                        }
                    }
                })
            })
        });
    });
</script>