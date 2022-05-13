<style>
    .testimonial-card .card-up {
height: 120px;
overflow: hidden;
border-top-left-radius: 0.25rem;
border-top-right-radius: 0.25rem;
}

.testimonial-card .avatar {
width: 110px;
margin-top: -60px;
overflow: hidden;
border: 3px solid #fff;
border-radius: 50%;
}
</style>

<br>
<section>
  
  <div class="row d-flex justify-content-center">
    <div class="col-md-10 col-xl-8 text-center">
    </div>
  </div>
<?php 
foreach($users as $user){
  $followUnfollow = 'Follow';
  if($user['id'] != $_SESSION['id']){  
    if(checkContainUser($followeds, $user['id'])){
      $followUnfollow = 'Unfollow';
    }
 ?>
  <div class="row d-flex justify-content-center">
    <div class="col-md-4 mb-5 mb-md-0">
      <div class="card testimonial-card">
        <div class="card-up" style="background-color: #9d789b;"></div>
        <div class="avatar mx-auto bg-white">
          <img src="avatar/<?= $user['avatar']; ?>"
            class="rounded-circle img-fluid" />
        </div>
        <div class="card-body">
          <h4 class="mb-4"><?= $user['prenom']; ?> <?= $user['nom']; ?></h4>
          <hr />
          <p class="dark-grey-text mt-4">
            <i class="fas fa-quote-left pe-2"></i><?= $user['bio']; ?>
          </p>
        </div>
        <div class="card-footer">
          <form method="post">
            <input type="hidden" name="id_followed" value="<?= $user['id']; ?>">
            <input type="hidden" name="action" value="<?= $followUnfollow; ?>">
          <button type="submit" name="btnFollowUnfollow"  class="btn btn-primary"><?php echo $followUnfollow ?></button>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php }} ?>

</section>
