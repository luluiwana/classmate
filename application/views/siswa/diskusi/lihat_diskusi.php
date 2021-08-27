<div class="container-fluid py-4">

    <div class="justify-content-md-end">
        <a href="<?= base_url() ?>siswa/add_discussion" class="btn btn-primary me-md-2" type="button">Add Discussion</a>
    </div>

    <?php foreach ($diskusi as $row) : ?>
        <div class="card-forum mt-3">

            <div class="row">
                <div class="col-md-1">
                    <div class="left-user12923 left-user12923-repeat">
                        <a href="#"><img src="<?= base_url('assets/img/team-3.jpg') ?>" alt="image"> </a> <a href="#"><i class="fa fa-check " aria-hidden="true"></i></a>
                    </div>
                </div>

                <div class="col-md-11">
                    <div class="right-description893">
                        <div id="que-hedder2983">
                            <h3><a class='text-white' href="<?= base_url('discussion/detail_discussion/' . $row->ForumQID) ?>" target="_blank"><?= $row->ForumQTitle ?></a></h3>
                        </div>
                        <div class="ques-details10018">
                            <?= $row->ForumQContent ?>
                        </div>
                        <hr>
                        <div class="ques-icon-info3293 tex"> <a href="#" class="text-white"><i class=" text-white fa fa-clock-o" aria-hidden="true"> 4 min
                                    ago</i></a> <a href="#" class="text-white"><i class="text-white fa fa-question-circle-o" aria-hidden="true"> Question</i></a>
                            <a href="#" class="text-white">
                                <i class="fa fa-commen text" aria-hidden="true"> 333335 answer</i>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="ques-type302">

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>