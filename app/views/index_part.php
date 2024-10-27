<form action="/proc.php" method="post" id="ask" >
    <input type="text" name="question" id="question" placeholder="What is your question?"/>
    <div class="form-button">
        <button >Ask the Magic</button>
    </div>
</form>
<img src="/images/magic.png" id="ball" alt="magic-ball">
<?php if(!empty($answer)) : ?>
<div>
    <p class="response">The Magic Ball says</p>
    <?= $answer ?>
</div>
<?php endif; ?>