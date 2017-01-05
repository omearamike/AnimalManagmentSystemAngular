<!-- modal for for creating new product -->
<div id="modal-animal-form" class="modal">
    <div class="modal-content">
        <h4 id="modal-animal-title">Create New Animal</h4>
        <div class="row">
            <div class="input-field col s12">
                <input ng-model="name" type="text" class="validate" id="form-name" placeholder="Type name here..." />
                <label for="name">Name</label>
            </div>

            <div class="input-field col s12">
                <textarea ng-model="description" type="text" class="validate materialize-textarea" placeholder="Type description here..."></textarea>
                <label for="description">Description</label>
            </div>


            <div class="input-field col s12">
                <input ng-model="price" type="text" class="validate" id="form-price" placeholder="Type price here..." />
                <label for="price">Price</label>
            </div>


            <div class="input-field col s12">
                <a id="btn-create-animal" class="waves-effect waves-light btn margin-bottom-1em" ng-click="createAnimal()"><i class="material-icons left">add</i>Create</a>

                <a id="btn-update-animal" class="waves-effect waves-light btn margin-bottom-1em" ng-click="updateAnimal()"><i class="material-icons left">edit</i>Save Changes</a>

                <a class="modal-action modal-close waves-effect waves-light btn margin-bottom-1em"><i class="material-icons left">close</i>Close</a>
            </div>
        </div>
    </div>
</div>
