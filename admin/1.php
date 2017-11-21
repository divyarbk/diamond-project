<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $id; ?>" data-name="<?php echo $name; ?>">Open modal for @mdo</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
...more buttons...

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">New message</h4>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="control-label">ID:</label>
            <input type="text" class="form-control" id="id">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Type:</label>
            <input type="text" class="form-control" id="type">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">price:</label>
            <input type="text" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Photo:</label>
            <input type="text" class="form-control" id="photo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Photo:</label>
            <input type="text" class="form-control" id="photo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Photo:</label>
            <input type="text" class="form-control" id="photo">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Gender:</label>
            <input type="text" class="form-control" id="genger">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Description</label>
            <textarea class="form-control" id="description"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


<div id="exampleModal1" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
	
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
	    <center><h1 style="margin-top: 30px;">Edit Product</h1></center>
	    <form style="padding: 30px;">
		    <?php $ph='<span id="photo"></span>';
			    
			    
		    ?>
          <div class="form-group">
            <label for="recipient-name" class="control-label">ID:</label>
            <input type="text" class="form-control" id="id">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Name:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Type:</label>
            <input type="text" class="form-control" id="type">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">price:</label>
            <input type="text" class="form-control" id="price">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="control-label">Photo:</label>
            <img src="../product/<span id='id'></span">
            <span id="photo"></span>
          </div>
          
          <div class="form-group">
            <label for="recipient-name" class="control-label">Gender:</label>
            <input type="text" class="form-control" id="genger">
          </div>
          <div class="form-group">
            <label for="message-text" class="control-label">Description</label>
            <textarea class="form-control" id="description"></textarea>
          </div>
        </form>
    </div>
  </div>
</div>


$('#exampleModal').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var id = button.data('id')
			  var name = button.data('name')
			  var type = button.data('type')
			  var price = button.data('price')
			  var quantity = button.data('quantity')
			  var photo = button.data('photo')
			  var photo1 = button.data('photo1')
			  var photo2 = button.data('photo2')
			  var description = button.data('description')
			  var gender = button.data('gender')			 
			   // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)			  
			  modal.find('#id').val(id)
			  modal.find('#name').val(name)
			  modal.find('#type').val(type)
			  modal.find('#price').val(price)
			  modal.find('#quantity').val(quantity)
			  modal.find('#photo').val(photo)
			  modal.find('#photo1').val(photo1)
			  modal.find('#photo2').val(photo2)
			  modal.find('#description').val(description)
			  modal.find('#gender').val(gender)
			  
			})
			
			
			$('#exampleModal1').on('show.bs.modal', function (event) {
			  var button = $(event.relatedTarget) // Button that triggered the modal
			  var id = button.data('id')
			  var name = button.data('name')
			  var type = button.data('type')
			  var price = button.data('price')
			  var quantity = button.data('quantity')
			  var photo = button.data('photo')
			  var photo1 = button.data('photo1')
			  var photo2 = button.data('photo2')
			  var description = button.data('description')
			  var gender = button.data('gender')			 
			   // Extract info from data-* attributes
			  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			  var modal = $(this)			  
			  modal.find('#id').val(id)
			  modal.find('#name').val(name)
			  modal.find('#type').val(type)
			  modal.find('#price').val(price)
			  modal.find('#quantity').val(quantity)
			  modal.find('#photo').html(photo)
			  modal.find('#photo1').val(photo1)
			  modal.find('#photo2').val(photo2)
			  modal.find('#description').val(description)
			  modal.find('#gender').val(gender)
			  
			})