
<form action="/add-product" id="product_form" method="post">
  <div class="row">
    <div class="col">
            <div class="form-group">
              <label>Sku</label>
                <input type="text" id="sku" name="sku" value="<?php echo $model->sku ?>" class="form-control <?php echo $model->hasError('sku') ? 'is-invalid' : '' ?>" />
                 <div class="invalid-feedback">
                    <?php echo $model->getFirstError('sku') ?>
                </div>

              

              

            </div> 



             <div class="form-group">
              <label>Name</label>
                <input type="text" id="name" name="name" value="<?php echo $model->name ?>" class="form-control <?php echo $model->hasError('name') ? 'is-invalid' : '' ?>"/>
                <div class="invalid-feedback">
                    <?php echo $model->getFirstError('name') ?>
                </div>

            </div>      

              <div class="form-group">
              <label>Price($)</label>
                <input type="text" id="price" name="price" value="<?php echo $model->price ?>" class="form-control <?php echo $model->hasError('price') ? 'is-invalid' : '' ?>"/>
                <div class="invalid-feedback">
                    <?php echo $model->getFirstError('price') ?>
                </div>
            </div>      


            <label>Product Switcher</label>





<select id="productType" name="type" class="form-control <?php echo $model->hasError('type') ? 'is-invalid' : '' ?>">
    <option value="">Select an option</option>
    <option value="dvd" id="DVD" <?php echo $model->type === 'dvd' ? 'selected' : '' ?>>Dvd</option>
    <option value="furniture" id="Furniture" <?php echo $model->type === 'furniture' ? 'selected' : '' ?>>Furniture</option>
    <option value="book" id="Book" <?php echo $model->type === 'book' ? 'selected' : '' ?>>Book</option>
</select>

<!-- <div class="invalid-feedback">
    <?php echo $model->getFirstError('type') ?>
</div>
 -->
      
       



<div class="form-group">
    <label for="size" id="sizeLabel" <?php echo $model->type !== 'dvd' ? 'style="display: none;"' : '' ?>>Size(MB)</label>
    <input type="text" id="size" name="size" <?php echo $model->type !== 'dvd' ? 'style="display: none;"' : '' ?> value="<?php echo $model->size ?>" class="form-control <?php echo $model->hasError('size') ? 'is-invalid' : '' ?>">

          <div class="invalid-feedback">
                    <?php echo $model->getFirstError('size') ?>
          </div>



</div>
  




<div>
    <label for="height" id="heightLabel" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?>>Height (CM)</label>
    <input type="text" id="height" name="height" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?> value="<?php echo $model->height ?>" class="form-control <?php echo $model->hasError('height') ? 'is-invalid' : '' ?>">


          <div class="invalid-feedback">
                    <?php echo $model->getFirstError('height') ?>
          </div>




    <label for="length" id="lengthLabel" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?>>Length (CM)</label>
    <input type="text" id="length" name="length" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?> value="<?php echo $model->length ?>" class="form-control <?php echo $model->hasError('length') ? 'is-invalid' : '' ?>">

           <div class="invalid-feedback">
                    <?php echo $model->getFirstError('length') ?>
          </div>


    
    <label for="width" id="widthLabel" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?>>Width (CM)</label>
    <input type="text" id="width" name="width" <?php echo $model->type !== 'furniture' ? 'style="display: none;"' : '' ?> value="<?php echo $model->width ?>" class="form-control <?php echo $model->hasError('width') ? 'is-invalid' : '' ?>"> 

           <div class="invalid-feedback">
                    <?php echo $model->getFirstError('width') ?>
          </div>
    


</div>

<div>
    <label for="weight" id="weightLabel" <?php echo $model->type !== 'book' ? 'style="display: none;"' : '' ?>>Weight (KG)</label>
    <input type="text" id="weight" name="weight" <?php echo $model->type !== 'book' ? 'style="display: none;"' : '' ?> value="<?php echo $model->weight ?>" class="form-control <?php echo $model->hasError('weight') ? 'is-invalid' : '' ?> "> 

  <div class="invalid-feedback">
                    <?php echo $model->getFirstError('weight') ?>
                    <!-- <p>Please Provide weight</p> -->
          </div>
  </div>


  
       

<!-- 
  <button type="submit" class="btn btn-primary">Submit</button> -->
</form>


<script> 


document.getElementById("productType").addEventListener("change", function() {
  if (this.value === "dvd") {
    document.getElementById("size").style.display = "block";
    document.getElementById("sizeLabel").style.display = "block";
    document.getElementById("height").style.display = "none";
    document.getElementById("heightLabel").style.display = "none";
    document.getElementById("width").style.display = "none";
    document.getElementById("widthLabel").style.display = "none";
    document.getElementById("length").style.display = "none";
    document.getElementById("lengthLabel").style.display = "none";
    document.getElementById("weight").style.display = "none";
    document.getElementById("weightLabel").style.display = "none";
    




  } else if (this.value === "furniture") {
    document.getElementById("height").style.display = "block";
    document.getElementById("heightLabel").style.display = "block";
  
    document.getElementById("width").style.display = "block";
    document.getElementById("widthLabel").style.display = "block";

    document.getElementById("length").style.display = "block";
    document.getElementById("lengthLabel").style.display = "block";


    document.getElementById("size").style.display = "none";
    document.getElementById("sizeLabel").style.display = "none";

    document.getElementById("weight").style.display = "none";
    document.getElementById("weightLabel").style.display = "none";

  } else if(this.value === "book"){

    document.getElementById("weight").style.display = "block";
    document.getElementById("weightLabel").style.display = "block";

     document.getElementById("size").style.display = "none";
    document.getElementById("sizeLabel").style.display = "none";
    document.getElementById("height").style.display = "none";
    document.getElementById("heightLabel").style.display = "none";
    document.getElementById("width").style.display = "none";
    document.getElementById("widthLabel").style.display = "none";
    
     document.getElementById("length").style.display = "none";
    document.getElementById("lengthLabel").style.display = "none";
    
  
  } else {
    document.getElementById("size").style.display = "none";
    document.getElementById("sizeLabel").style.display = "none";
    document.getElementById("height").style.display = "none";
    document.getElementById("heightLabel").style.display = "none";
    document.getElementById("width").style.display = "none";
    document.getElementById("widthLabel").style.display = "none";
    
     document.getElementById("length").style.display = "none";
    document.getElementById("lengthLabel").style.display = "none";

      document.getElementById("weight").style.display = "none";
    document.getElementById("weightLabel").style.display = "none";
	   
  }
});











</script>




