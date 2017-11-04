<h3>Content</h3>

<div class="card card-default">
	<div class="card-header">
		<h4 class="card-title">Add content block</h4>
	</div>
	<div class="card-block">
		<div class="radio radio-success">
          	<input type="radio" v-model="new_data.content.type" value="section_title" id="content_section_title" name="content_type"  >
          	<label for="content_section_title">Section title</label>
        
          	<input type="radio" v-model="new_data.content.type" value="text" id="content_text" name="content_type"  >
          	<label for="content_text">Text</label>
        
          	<input type="radio" v-model="new_data.content.type" value="text_with_images" id="content_text_with_images" name="content_type"  >
          	<label for="content_text_with_images">Text with images</label>
        </div>
	</div>

	<div class="card-block" v-show="new_data.content.type">
		<div class="row">	
			<div class="col">
				<div class="form-group">
					<label for="content_title" >Title</label>
					<input type="text" id="content_title" class="form-control" v-model="new_data.content.title" placeholder="Enter a title" >
				</div>

				<div class="form-group">
					<label for="content_subtitle" >Subtitle</label>
					<input type="text" id="content_subtitle" class="form-control" v-model="new_data.content.subtitle" placeholder="Enter a subtitle" >
				</div>

				<trumbowyg v-model="new_data.content.text" :config="text_editor_settings" ></trumbowyg>

			</div>

			<div class="col-3" v-show="new_data.content.type == 'section_title'" >

				<div class="form-group">
					<label for="content_background_file" >Background image URL</label>
					<input type="text" id="content_background_file" class="form-control" v-model="new_data.content.background.file" placeholder="Enter an image url" >
				</div>

				<div class="form-group">
					<label for="content_background_opacity" >Background opacity (0 to 100)</label>
					<input type="text" id="content_background_opacity" class="form-control" v-model="new_data.content.background.opacity" placeholder="Enter opacity from 0 to 100" >
				</div>
			</div>

			<div class="col-3" v-show="new_data.content.type == 'text_with_images'">
				
				<h4>Block images</h4>

				<div class="d-flex flex-column">
					<div class="my-2" v-for="image in new_data.content.images" >
						<p><img class="img-thumbnail" :src="image_path + image.file" ></p>
						<p>@{{image.caption}}</p>
					</div>
				</div>

				<h5>Insert new image</h5>
				<div class="form-group">
					<input type="text" id="content_image_file" class="form-control" v-model="new_data.content_image.file" placeholder="Image url" >
				</div>

				<div class="form-group">
					<input type="text" id="content_image_caption" class="form-control" v-model="new_data.content_image.caption" placeholder="Image caption" >
				</div>

				<div class="form-group">
					<button type="button" class="btn btn-default" @click="addContentImage" ><i class="fa fa-plus"></i> Insert image</button>
				</div>

			</div>
		</div>

	</div>

	<div class="card-footer d-flex justify-content-between" v-if="new_data.content.type">
		<button type="button" @click="addItem('content')" class="btn btn-success" >Save block</button>
		<button type="button" @click="new_data.content.type = null" class="btn btn-default" >Cancel</button>
	</div>
</div>

<h4>Content blocks</h4>
<p>They will appear on the main Careers page in this order, <b>after</b> the current jobs list.</p>

<div class="card card-default" v-for="(content, key) in page.content" >
	<div class="card-header">
		<h5 class="card-title">@{{content.type}}</h5>
	</div>
	<div class="card-block">
		<div class="row">
			<div class="col">

				<h4 v-text="content.title"></h4>
				<h5 v-text="content.subtitle" ></h5>

				<div class="my-2" v-html="content.text"></div>
			</div>

			<div class="col-3" v-if="content.background.file" >
				
				<h5>Background image</h5>

				<p>Opacity: @{{content.background.opacity}}</p>
				<p><img class="img-thumbnail" :src="image_path + content.background.file" ></p>

			</div>

			<div class="col-3" v-if="content.images.length > 0">
				
				<h4>Block images</h4>

				<div class="d-flex flex-column">
					<div class="my-2" v-for="image in content.images" >
						<p><img class="img-thumbnail" :src="image_path + image.file" ></p>
						<p>@{{image.caption}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="d-flex justify-content-between">
			
			<div>
				<a href="#up" @click="moveItem('content', 'up', key)" title="Move up" class="mr-3" >
		            <i class="fa fa-angle-up"></i> move up
		        </a>
    			
    			<a href="#down" @click="moveItem('content', 'down', key)" title="Move down" >
	            	<i class="fa fa-angle-down"></i> move down
	        	</a>
	        </div>
	        <div>
		        <a href="#del" @click="deleteItem('content', key)" class="text-danger" >
		            <i class="fa fa-times"></i> delete
		        </a>
	        </div>
    	</div>
	</div>
</div>
