<h3>Slides</h3>

<div class="card card-default no-padding" v-for="(slide, key) in page.slides">
	<div class="card-block">
		<div class="d-flex justify-content-between">
			
			<div>
				<p>
					Opacity: @{{slide.background.opacity}}%
				</p>
				<p>
					<img :src="image_path + slide.background.file" style="max-width: 200px;" >
				</p>
			</div>

			<div>
				<h5 class="small">Title</h5>
				<h4>@{{slide.title}}</h4>
			</div>

			<div>
				<h5 class="small">Subtitle</h5>
				<h5>@{{slide.subtitle}}</h5>
			</div>

			<div>
				<h5 class="small">Text</h5>
				@{{slide.text}}
			</div>
			<div>
				<h5 class="small">Button</h5>
				@{{slide.button.text}} (link: @{{slide.button.link}})
			</div>
		</div>
	</div>
	<div class="card-footer">
		<div class="d-flex justify-content-between">
			
			<div>
				<a href="#up" @click="moveItem('slides', 'up', key)" title="Move up" class="mr-3" >
		            <i class="fa fa-angle-up"></i> move up
		        </a>
    			
    			<a href="#down" @click="moveItem('slides', 'down', key)" title="Move down" >
	            	<i class="fa fa-angle-down"></i> move down
	        	</a>
	        </div>
	        <div>
		        <a href="#del" @click="deleteItem('slides', key)" class="text-danger" >
		            <i class="fa fa-times"></i> delete
		        </a>
	        </div>
    	</div>

	</div>
</div>

<div class="card card-success" v-show="new_data.slides.has_changes">
	<div class="card-block text-center">
		<button type="button" class="btn btn-success" @click="update('slides')" >Save changes</button>
	</div>
</div>

<div class="card card-default">
	<div class="card-header">
		<h4 class="card-title">Add new slide</h4>
	</div>
	<div class="card-block">

		<div class="d-flex align-content-start my-2">
			
			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.title" placeholder="Slide title" >
			</div>

			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.subtitle" placeholder="Slide subtitle" >
			</div>

			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.text" placeholder="Text" >
			</div>

		</div>

		<div class="d-flex align-content-start my-2">
			
			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.button.text" placeholder="Button text" >
			</div>

			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.button.link" placeholder="Button link" >
			</div>

			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.background.file" placeholder="Background image" >
			</div>

			<div class="mr-2">
				<input type="text" class="form-control" v-model="new_data.slides.background.opacity" placeholder="Image opacity" >
			</div>
		</div>

		<button type="button" @click="addItem('slides')" class="btn btn-default" >Save</button>

	</div>
</div>
