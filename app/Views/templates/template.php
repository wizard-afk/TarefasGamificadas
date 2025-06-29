<?= $this->include('templates/header') ?>
<?= $this->include('templates/navbar') ?>
<?= $this->include('templates/sidebar') ?>

<div class="content-wrapper">
    <?= $this->renderSection('conteudo') ?>
</div>

<?= $this->include('templates/footer') ?>
<?= $this->include('templates/scripts') ?> 
