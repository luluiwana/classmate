<div class="row mt-4 mx-0">
    <p class="text-white fw-bold">Teman sekelas</p>
    <div class="card bg-darkblue">
        <div class="card-body row">
            <div class="col-md-6">

                <table class="table table-hover mt-3">
                    <tbody>
                        <?php foreach($teman as $row):?>
                        <tr>
                            <td>
                                <img src="<?=base_url()?>media/avatar/<?=$row->UserAvatar?>" class="small-ava" alt="">
                            </td>
                            <td><?=$row->UserName?></td>

                        </tr>
                        <?php  endforeach;?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6  d-none d-sm-block">
                <img src="<?=base_url()?>assets/img/vector/Connected-rafiki.svg" class="vector-teman" alt="" srcset="">

            </div>
        </div>
    </div>
</div>
</div>
</main>