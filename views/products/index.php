<h1>Product List</h1>
<p>
  <a href="/products/create" class="btn btn-success">Create product</a>
</p>

<form>
  <div class="input-group mb-3">
    <input type="text" name="search" class="form-control" placeholder="Search" value="<?php echo $search ?>">
    <div class="input-group-append">
      <button tupe="submit" class="btn-outline-secondary">Search</button>
    </div>
  </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th>#</th>
      <th>Image</th>
      <th>Title</th>
      <th>Price</th>
      <th>Create Date</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $i => $product) : ?>
      <tr>
        <td><?php echo $i + 1; ?></td>
        <td>
          <?php if ($product['image']) : ?>
            <img src="/<?php echo $product['image'] ?>" class="thumb-image">
          <?php endif; ?>
        </td>
        <td><?php echo $product['title'] ?></td>
        <td><?php echo $product['price'] ?></td>
        <td><?php echo $product['create_date'] ?></td>
        <td>
          <a href="/products/update?id=<?php echo $product['id'] ?>" class="btn btn-primary">Update</a>
          <form action="/products/delete" method="post">
            <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
            <button type="submit" class="btn btn-danger">Delete</button>
          </form>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>