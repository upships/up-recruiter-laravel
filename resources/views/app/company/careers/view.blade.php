@extends('layouts.master')

@section('page-title','Careers page')

@section('content')

<div class="row">
    <div class="col">
    
        <h2>Careers page</h2>

        <div class="card card-borderless">
            <ul class="nav nav-tabs nav-tabs-simple" role="tablist" data-init-reponsive-tabs="dropdownfx">
                <li class="nav-item">
                    <a class="active" href="#" data-toggle="tab" role="tab" data-target="#tab-content"> 
                        Content
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-slides"> 
                        Slides
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-images">
                        Images
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-menus">
                        Menus
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" data-toggle="tab" role="tab" data-target="#tab-settings">
                        Settings
                    </a>
                </li>
            </ul>

            <div class="tab-content">

                <div id="tab-content" class="tab-pane active">
                    @include('app.company.careers.tabs.content')
                </div>

                <div id="tab-slides" class="tab-pane">
                    @include('app.company.careers.tabs.slides')
                </div>

                <div id="tab-images" class="tab-pane">
                    @include('app.company.careers.tabs.images')
                </div>

                <div id="tab-menus" class="tab-pane">
                    @include('app.company.careers.tabs.menus')
                </div>

                <div id="tab-settings" class="tab-pane">
                    @include('app.company.careers.tabs.settings')
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('local-footer')

<script>

    new Vue({

        el: '#up-app',

        data: {

            image_path: null,

            page: {
                menus: [],
                settings: [],
                content: [],
                images: [],
                slides: []
            },

            new_data: null,

            text_editor_settings: {
                        
                        btns: [
                            
                            ['undo', 'redo'],
                            ['formatting'],
                            ['strong', 'em', 'del'],
                            ['link'],
                            ['justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull'],
                            ['unorderedList', 'orderedList'],
                        ]
                }
        },

        beforeMount: function() {

            let vm = this;

            axios.get('/json/company/careers').then(function(response)    {

                if(response.data.menus)    {
                    
                    vm.page.menus = response.data.menus;
                }

                if(response.data.slides)    {

                    vm.page.slides = response.data.slides;
                }

                if(response.data.images)    {
                    
                    vm.page.images = response.data.images;
                }
                
                
                if(response.data.settings)    {

                    vm.page.settings = response.data.settings;
                }

                if(response.data.content)    {

                    vm.page.content = response.data.content;
                }

                vm.image_path = response.data.image_path;
            });

            this.resetSchema();
        },

        methods: {

            addItem: function(type) {

                var element = this['new_data'][type];

                this['page'][type].push(element);

                this.resetSchema();

                this.update(type);
            },

            deleteItem: function(type, key) {

                Vue.delete(this['page'][type], key);

                this['new_data'][type]['has_changes'] = true;
            },

            deleteImage: function(key) {

                var image = this['page']['images'][key];
                var data = {params: {file: image.file}};
                var vm = this;

                // Send order to delete file
                axios.delete('/json/company/careers/image', data).then(function(response)    {

                    vm.deleteItem('images', key);

                    vm.update('images');

                });
            },

            update: function(type)  {

                let vm = this;
                let data = {type: type, data: this['page'][type] }

                axios.patch('/json/company/careers', data).then( function(response)   {

                    console.log('Updated');

                    vm['new_data'][type]['has_changes'] = false;

                });

            },

            moveItem: function (type, direction , key)  {

                var elements = this['page'][type];
                var length = elements.length;

                if((direction == 'up' && key > 0) || (direction == 'down', key < length ))  {

                    var replacedKey;
                    var replacedItem;

                    var temporaryKey = length++;

                    // Get new key

                    if(direction == 'up')   {

                        replacedKey = key--;
                    }
                    else {

                        replacedKey = key++;
                    }
                    
                    originalItem = elements[key];
                    replacedItem = elements[replacedKey];

                    // Set temporary items


                    // Switch items
                    Vue.set(elements, replacedKey, originalItem);
                    Vue.set(elements, key, replacedItem);

                    // Signal that there are changes to be saved
                    this['new_data'][type]['has_changes'] = true;
                }
            },

            onFileChange: function(e) {
                
                let files = e.target.files || e.dataTransfer.files;
                
                if (!files.length) return;

                this.createImage(files[0]);
            },

            createImage: function(file) {
                
                let reader = new FileReader();
                let vm = this;
                reader.onload = (e) => {
                    
                    vm.new_data.images.file = e.target.result;
                };

                reader.readAsDataURL(file);
            },

            upload: function(){
                
                let vm = this;

                axios.post('/json/company/careers/image', this.new_data.images).then( function(response) {

                    let thisImage = {file: response.data.file, caption: response.data.caption};

                    vm.new_data.images = {file: null, captio: null, has_changes: false};
                    
                    vm.page.images.push(thisImage);

                    vm.update('images');
                });
            },

            addContentImage: function() {

                this.new_data.content.images.push(this.new_data.content_image);

                this.resetSchema('content_image');
            },

            resetSchema: function(type) {

                var schema = {

                                menus: {
                                    link: null,
                                    label: null,
                                    has_changes: false,
                                },

                                images: {

                                    file: null,
                                    caption: null,
                                    has_changes: false,
                                },

                                content: {

                                    type: null,
                                    title: null,
                                    subtitle: null,
                                    text: null,
                                    background: {
                                        file: null,
                                        opacity: null,
                                    },

                                    images: [],

                                    has_changes: false,
                                },

                                content_image: {
                                    file: null,
                                    caption: null,
                                },

                                slides:     {

                                    title: null,
                                    subtitle: null,
                                    text: null,

                                    button: {
                                        text: null,
                                        link: null,
                                    },

                                    background: {
                                        file: null,
                                        opacity: null,
                                    },

                                    has_changes: false,
                                }
                            };

                if(type)    {

                    this['new_data'][type] = schema[type];
                }
                else {

                    this.new_data = schema;
                }
            },


        },

    });

</script>

@endsection