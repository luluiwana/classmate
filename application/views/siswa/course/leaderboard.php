<div class="row mt-4 mx-0">
    <div class="col-md-6">
        <img src="<?=base_url()?>assets/img/vector/Growth curve-cuate.svg" alt="">
    </div>
    <div class="col-md-6 card-forum mt-3">
        <div class="row">
            <span class="fw-bold text-white small mt-2 w-60"> <i class="fas fa-dot-circle text-warning me-1"
                    aria-hidden="true"></i>LEADERBOARD</span>
            <span class="fw-bold text-white small mt-2 w-40 text-end"> <i class="fas fa-star text-warning"
                    aria-hidden="true"></i>
                SKOR
            </span>
        </div>
        <div class="mt-4 ">
            <?php foreach($leaderboard as $row):?>
            <div class="row bg-darkgreen py-3 border-end border-success border-3">
                <div class="lb-forum w-20 my-auto">
                    <img src="http://localhost/classmate/media/avatar/<?=$row->UserAvatar?>" alt="image" class="w-35px my-auto">
                </div>
                <div class="nama-lb-forum w-60 my-auto">
                    <div class=" my-auto small"><?=$row->UserName?></div>
                </div>
                <div class="skor-forum w-20 my-auto">
                    <div class="fw-bolder small"><?=$row->courseXP?></div>
                </div>
            </div>
            <?php endforeach;?>
        </div>

    </div>
    
</div>
</div>
</main>