<?php
    $signages = $this->getSignages();
    $locations = $this->getLocations();
?>
<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-map-fill"></i>
                Data:
            </div>
            <div class="card-body">
                <table id="locations" class="table table-dark mt-3">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Signage</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $locations->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["name"]. '</td>';
                                echo '<td>' . $row["signage_name"]. '</td>';
                                echo '<td>' . $row["latitude"]. '</td>';
                                echo '<td>' . $row["longitude"]. '</td>';
                                echo '<td>
                                        <a 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Edit"
                                            class="location-edit" 
                                            id="edit-'.$row["id"].'">
                                                <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a   
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Delete"
                                            class="location-delete" 
                                            id="delete-'.$row["id"].'">
                                                <i class="bi bi-trash"></i>
                                        </a>
                                    </td>';
                                echo '</tr>';
                            }  
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col overflow-auto">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-plus-square-fill"></i>
                Create New:
            </div>
            <div class="card-body">
                <form method="post" action="route">
                    <input type="hidden" name="action" value="createLocation">
                    <div class="form-group mb-3">
                        <div class="label">Name:</div>
                        <input type="text" name="name" class="text-field form-control" placeholder="Create Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Signage:</div>
                        <select name="signage_id" class="form-control" required>
                            <?php
                                while($row = $signages->fetch_assoc()) {
                            ?>
                                <option style="color: #000000;" value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Latitude:</div>
                        <input type="text" name="latitude" class="text-field form-control" placeholder="Assign Latitude" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Longitude: </div>
                        <input type="text" name="longitude" class="text-field form-control" placeholder="Assign Longitude" required>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" value="Create" class="btn btn-info btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-location-modal" tabindex="-1" aria-labelledby="edit-location-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Location</h5>
                    <button type="button" onClick="closeLocationModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <div class="label">Name:</div>
                        <input type="text" id="location-name" class="text-field form-control" placeholder="Edit Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Signage:</div>
                        <select id="location-signage" class="form-control" required>
                            <?php
                                $signages = $this->getSignages();
                                while($row = $signages->fetch_assoc()) {
                            ?>
                                <option style="color: #000000;" value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Latitude:</div>
                        <input type="text" id="location-latitude" class="text-field form-control" placeholder="Edit Latitude" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Longitude: </div>
                        <input type="text" id="location-longitude" class="text-field form-control" placeholder="Edit Longitude" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" onClick="closeLocationModal()" class="btn btn-secondary">Close</button>
                    <button type="button" id="save-location-modal" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</div>