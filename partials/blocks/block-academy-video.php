<?php

/**
 * Block Name: Academy video banner
 *
 * This is homepage academy video banner block.
 */

?>

<section class="academy">
  <h2 class="academy__heading" >Bloom Academy</h2>
  <div class="academy__wrapper">
    <div class="row">
      <div class="col-12 col-lg-6">
        <div class="position-relative h-100">
          <img class="academy__image" src="https://s3-alpha-sig.figma.com/img/4e0e/5883/97a78af3280103774f12285c92e6da04?Expires=1650240000&Signature=L1vq~yShUaL3IB8DnWZku9HoUtPAKjL6y0tr09hpmi2w9NG0nGPfNnqm6t40m-GTJVeHjgBOYefQAOAPFRJLWS95iXj5UhQdvWQhHVfi5LKVvIvm38skw0Reu2gW3kmMoY5iIK~M5XN~YbJ3iCEJwCSEjgWOZ~C0A9yMYoclvtJ8177FhCelABHrzb-uF60gEKKctC0dlI15JMbrThqPwxPdm6XigruvnrtqjygeoUomTdj2nx4UjHu-nrJ4eU0ZzCuvoP1RwiN~Krqdeq~eKgDPeEutmhq7roEueQ3f3Rsre5dhwKHjTB1AMciYaMLe1J44mMMOEMtPCL9YnAyqhQ__&Key-Pair-Id=APKAINTVSUGEWH5XD5UA" alt="Academy banner">
          <img class="position-absolute top-50 start-50 translate-middle" src="<?php echo get_template_directory_uri(); ?>/_/img/play.svg" alt="play button">
        </div>
      </div>
      <div class="col-12 col-lg-6">
        <div class="academy__box d-lg-flex flex-column h-100 justify-content-center">
          <h3 class="academy__title">Vivir con endometriosis</h3>
          <p class="academy__desc">En este curso descubrirás una guía con todo lo necesario sobre la endometriosis.</p>
          <a href="#" class="academy__button btn btn-secondary box-shadow-pink">Ver curso</a>
        </div>
      </div>
    </div>
  </div>
</section>