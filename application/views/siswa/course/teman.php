<div class="row mx-0 mt-4">
    <div class="text-white fw-bold">Daftar Nama Siswa</div>
    <div class="card mt-3 bg-darkblue">
        <div class="card-body overflow-auto">
            <table class="table table-hover mt-3" >
               
                <tbody>
                   
                    <?php foreach($teman as $row):?>
                    <tr>
                        <td>
                            <img src="<?=base_url()?>media/avatar/<?=$row->UserAvatar?>" class="small-ava" alt="">
                        </td>
                        <td><?=$row->UserName?></td>
                        <td>Level</td>
                        <td>Poin XP</td>
                        
                    </tr>
                    <?php  endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</main>