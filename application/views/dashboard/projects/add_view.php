<style type="text/css">
label{
    text-align:left;
    font-weight:bold;
}
input[type="submit"]{
    margin-left:130px;
}

input{
    font-size: 14px;
    padding: 8px;
    margin-bottom: 10px;
}
</style>

<div class="row">
    <div class="span10">
        <h2>Projects</h2>
        <?= form_open('dashboard/projects/add') ?>
        
        <label for="name">Name:</label><input type="text" name="name" /><br/>
        <label for="description">Description:</label><input type="text" name="description" /><br/>
        <input class="btn primary" type="submit" value="Submit" />
        
        <?= form_close()?>
    </div>
    <div class="span4">
        <h3>Tasks</h3>
    </div>
</div>