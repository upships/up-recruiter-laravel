<div class="table-responsive">
    <table class="table table-hover" id="basicTable">
        <thead>
            <tr>
                <th>Label</th>
                <th>Link</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            
            <tr v-for="(menu, key) in page.menu" >
                <td>@{{menu.label}}</td>
                <td>@{{menu.link}}</td>
                
                <td>
                    <div class="d-flex justify-content-around" >
                        <a href="#up" @click="moveItem('menu', 'up', key)" title="Move up" >
                            <i class="fa fa-angle-up"></i>
                        </a>
                    
                        <a href="#del" @click="deleteItem('menu', key)" class="text-danger" >
                            <i class="fa fa-times"></i>
                        </a>

                        <a href="#up" @click="moveItem('menu', 'down', key)" title="Move down" >
                            <i class="fa fa-angle-down"></i>
                        </a>

                    </div>
                </td>
            </tr>

            <tr v-show="new_data.menu.has_changes">
                <td colspan="3" class="text-center" >

                    <button type="button" class="btn btn-success" @click="update('menu')" >Save changes</button>

                </td>
            </tr>

            <tr>
                <td>
                    <input type="text" class="form-control" v-model="new_data.menu.label" placeholder="Label" >
                </td>
                <td>
                    <input type="text" class="form-control" v-model="new_data.menu.link" placeholder="Link" >
                </td>
                <td>
                    <button type="button" class="btn btn-default" @click="addItem('menu')" >
                        <i class="fa fa-check"></i>
                    </button>
                </td>
            </tr>

        </tbody>
    </table>
</div>