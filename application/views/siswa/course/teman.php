<div class="row mx-0 mt-4">
    <div class="text-white fw-bold">Daftar Nama Siswa</div>
    <div class="card mt-3 bg-darkblue">
        <div class="card-body overflow-auto">
            <table class="table table-hover mt-3" id="teman">
                <thead>
                    <th>No</th>
                    <th>Avatar</th>
                    <th>Nama Lengkap</th>
                    <th>Level</th>
                    <th>Total XP</th>
                  
                </thead>
                <tbody>
                    <?php $i=1;?>
                    <?php foreach($teman as $row):?>
                    <tr>
                        <td><?=$i?></td>
                        <td>
                            <img src="<?=base_url()?>media/avatar/<?=$row->UserAvatar?>" class="small-ava" alt="">
                        </td>
                        <td><?=$row->UserName?></td>
                        <td>Level</td>
                        <td>Poin XP</td>
                        
                    </tr>
                    <?php $i++; endforeach;?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
</main>