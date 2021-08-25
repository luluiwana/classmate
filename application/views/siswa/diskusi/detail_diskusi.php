<div class="container-fluid">
    <div class="card-forum">
        <div class="details-header923">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-title-left129 ">
                        <h3 class="text-white"><?= $thread->ForumQTitle ?></h3>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post-que-rep-rihght320"> <a href="#"><i class="fa fa-question-circle" aria-hidden="true"></i> Question</a> </div>
                </div>
            </div>
            <div class="post-footer29032">
                <div class="l-side2023"> <i class="fa fa-check check2" aria-hidden="true"> solved</i> <a href="#"></a> <i class="fa fa-clock-o clock2 text-white" aria-hidden="true"> 4 min ago</i> <a href="#"><i class="fa fa-commenting commenting2 text-white" aria-hidden="true"> 5 answer</i></a> </div>

            </div>
        </div>
        <div class="post-details-info1982">
            <?= $thread->ForumQContent ?>
            <hr>

            <h5 class="text-white mb-3"> COMMENTS</h5>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-1">
                                <div class="left-user12923 ">
                                    <a href="#" class="mx-auto"><img src="<?= base_url('assets/img/team-3.jpg') ?>" alt="image"> </a>
                                </div>
                            </div>
                            <div class="col-11">
                                <h6 class="card-title text-white">Card title</h6>
                                <p class="card-text mb-2" style="font-size: 0.8rem;">With supporting text below as a natural lead-in to additional content.</p>
                                <a href="#" class="card-text text-white" style="font-size: 0.7rem;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"><i class="fa fa-commenting card-text text-white " style="font-size: 0.7rem;" aria-hidden="true">&nbsp; </i>Edit Komentar </a>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card-forum">
        <form action="<?= base_url('discussion/addComments/' . $thread->ForumQID) ?>" method="post">
            <h5 class="text-white mb-3">ADD COMMENTS</h5>
            <div class="form-group row">
                <textarea name="content" id="add_question" class=" form-control" required></textarea>
            </div>

            <button type="submit" class="btn btn-block btn-primary">Comment</button>
        </form>
    </div>
</div>