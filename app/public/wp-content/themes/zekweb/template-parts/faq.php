<?php 
$faq = get_field('faq');
?>
<section class="faq">
  <div class="container">
    <h2 class="title-orange">Câu hỏi thường gặp</h2>
    
    <div class="accordion" id="accordionExample">
      <?php $i = 0; ?>
      <?php foreach ($faq as $item) : ?>
      <div class="accordion-item">

        <h2 class="accordion-header" id="heading-<?php echo $i; ?>">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse-<?php echo $i; ?>">
            <?php echo $item['question']; ?>
          </button>
        </h2>
        <div id="collapse-<?php echo $i; ?>" class="accordion-collapse collapse <?php echo $i == 0 ? 'show' : ''; ?>" aria-labelledby="heading-<?php echo $i; ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <?php echo $item['answer']; ?>
          </div>
        </div>
      </div>
      <?php $i++; ?>
      <?php endforeach; ?>
    </div>
  </div>
</section>