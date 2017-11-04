<h3>Images</h3>

<div class="table-responsive">
    <table class="table table-hover" id="basicTable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Caption</th>
                <th>URL</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            
            <tr v-for="(image, key) in page.images" >
                <td>
                	<img :src="image_path + image.file" style="max-width: 100px" >
            	</td>
                <td>@{{image.caption}}</td>
                <td>
                	<input type="text" class="form-control" v-model="image.file" readonly>
				</td>
                <td>
                    <a href="#del" @click="deleteImage(key)" class="text-danger" >
						<i class="fa fa-times"></i> delete
					</a>
                </td>
            </tr>

            <tr>
                <td>
                    <img :src="new_data.images.file" style="max-width: 100px" >
                </td>
                
                <td>
                	<input type="text" class="form-control" v-model="new_data.images.caption" placeholder="Image caption" >
                </td>
                
                <td>
                	<input type="file" class="form-control" v-on:change="onFileChange" placeholder="Choose a file" >
                </td>

                <td>
                    <button type="button" class="btn btn-default" @click="upload()" >
                        <i class="fa fa-check"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>