<div class="container" style="width: 300px; margin-top: 200px;">

    <form action=" <?php $this->getUrl()->getUrl('login'); ?>" method="POST">

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">User Name:</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Enter Username" name="username">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" placeholder="Enter Password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>