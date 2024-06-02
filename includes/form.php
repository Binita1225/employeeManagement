<?php if(!empty($error)) : ?>
    <!-- error empty xaina vana error throw garxa -->
<ul>
<?php foreach($error as $error): ?>
<li><?= $error ?></li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
<form action="" method="post">
    <h3>Employee Details</h3>
    <div>
        <label for="name">Name: </label>
        <input type="text" name="name" id="name" placeholder="Enter name" value="<?=htmlspecialchars($name); ?>">
    </div>
    <div>
        <label for="contact">Contact: </label>
        <input type="number" name="contact" id="contact" placeholder="Contact" value="<?=htmlspecialchars($contact); ?>">
    </div>
    <div>
        <label for="address">Address: </label>
        <input type="text" name="address" id="address" placeholder="address" value="<?=htmlspecialchars($address); ?>">
    </div>
    <div>
        <label for="position">Position: </label>
        <input type="text" name="position" id="position" placeholder="position" value="<?=htmlspecialchars($position); ?>">
    </div>
    <div>
        <label for="salary">Salary: </label>
        <input type="number" name="salary" id="salary" placeholder="salary" value="<?=htmlspecialchars($salary); ?>">
    </div>

    <button>Save</button>
</form>