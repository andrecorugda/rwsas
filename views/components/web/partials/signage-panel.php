<div class="row">
    <div class="col">
        <div class="card mb-4">
            <div class="card-header">
                <i class="bi bi-map-fill"></i>
                Data:
            </div>
            <div class="card-body">
                <table id="signages" class="table table-dark">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Alert&nbsp;Distance</th>
                            <th>Alert&nbsp;Sound</th>
                            <th>Active</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $signages = $this->getSignages();
                            while($row = $signages->fetch_assoc()) {
                                echo '<tr>';
                                echo '<td>' . $row["name"]. '</td>';
                                echo '<td><img style="height:25px;width:25px;" src="data:image/jpg;charset=utf8;base64,'. base64_encode($row['image']) .'" /> </td>';
                                echo '<td>' . $row["alert_distance"]. '</td>';
                                echo '<td>
                                        <audio style="height: 30px;width: 250px" controls>
                                            <source src="assets/materials/sound' . $row["alert_sound"]. '.wav" type="audio/ogg">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>';
                                echo '<td>' . ($row["active"] == 1 ? "True":"False"). '</td>';
                                echo '<td>
                                        <a 
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Edit"
                                            class="signage-edit" 
                                            id="edit-'.$row["id"].'">
                                                <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <a   
                                            data-toggle="tooltip" 
                                            data-placement="bottom" 
                                            title="Delete"
                                            class="signage-delete" 
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
                <form method="post" action="route" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="createSignage">
                    <div class="form-group mb-3">
                        <div class="label">Name:</div>
                        <input type="text" name="name" class="text-field form-control" placeholder="Create Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Image:</div>
                        <input type="file" name="signage-image" class="form-control" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Alert Distance (Meters):</div>
                        <input type="number" name="alert_distance" class="text-field form-control" placeholder="Distance in Meters" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Alert Sound: </div>
                        <div class="mt-2">
                            <input style="vertical-align: super;" type="radio" id="alert_sound-1" name="alert_sound" value="1" checked required>
                            <audio style="height: 30px;" controls>
                                <source src="assets/materials/sound1.wav" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div>
                            <input style="vertical-align: super;" type="radio" id="alert_sound-2" name="alert_sound" value="2" required>
                            <audio style="height: 30px;" controls>
                                <source src="assets/materials/sound2.wav" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div>
                            <input style="vertical-align: super;" type="radio" id="alert_sound-3" name="alert_sound" value="3" required>
                            <audio style="height: 30px;" controls>
                                <source src="assets/materials/sound3.wav" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div>
                            <input style="vertical-align: super;" type="radio" id="alert_sound-4" name="alert_sound" value="4" required>
                            <audio style="height: 30px;" controls>
                                <source src="assets/materials/sound4.wav" type="audio/ogg">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <div class="label">Active: </div>
                        <select name="active" class="form-control" required>
                            <option style="color: #000000;" value="1">True</option>
                            <option style="color: #000000;" value="0">False</option>
                        </select>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" value="Create" class="btn btn-info btn-block">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="edit-signage-modal" tabindex="-1" aria-labelledby="edit-signage-modal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Signage</h5>
                    <button type="button" onClick="closeSignageModal()" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="route" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="updateSignage">
                        <input type="hidden" id="signage-id" name="id" value="updateSignage">
                        <div class="form-group mb-3">
                            <div class="label">Name:</div>
                            <input type="text" id="signage-name" name="name" class="text-field form-control" placeholder="Create Name" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="label">Image:</div>
                            <img style="height:200px;width:200px;" id="signage-preview" alt="signage image" /> 
                            <div class="label">Upload New:</div>
                            <input type="file" id="signage-image" name="signage-image" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <div class="label">Alert Distance (Meters):</div>
                            <input type="number" id="signage-alert_distance" name="alert_distance" class="text-field form-control" placeholder="Distance in Meters" required>
                        </div>
                        <div class="form-group mb-3">
                            <div class="label">Alert Sound: </div>
                            <div class="mt-2">
                                <input style="vertical-align: super;" type="radio" id="alert_sound-1" name="signage-alert_sound" value="1" required>
                                <audio style="height: 30px;" controls>
                                    <source src="assets/materials/sound1.wav" type="audio/ogg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div>
                                <input style="vertical-align: super;" type="radio" id="alert_sound-2" name="signage-alert_sound" value="2" required>
                                <audio style="height: 30px;" controls>
                                    <source src="assets/materials/sound2.wav" type="audio/ogg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div>
                                <input style="vertical-align: super;" type="radio" id="alert_sound-3" name="signage-alert_sound" value="3" required>
                                <audio style="height: 30px;" controls>
                                    <source src="assets/materials/sound3.wav" type="audio/ogg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                            <div>
                                <input style="vertical-align: super;" type="radio" id="alert_sound-4" name="signage-alert_sound" value="4" required>
                                <audio style="height: 30px;" controls>
                                    <source src="assets/materials/sound4.wav" type="audio/ogg">
                                    Your browser does not support the audio element.
                                </audio>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <div class="label">Active: </div>
                            <select id="signage-active" name="active" class="form-control">
                                <option style="color: #000000;" value="1">True</option>
                                <option style="color: #000000;" value="0">False</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" onClick="closeSignageModal()" class="btn btn-secondary">Close</button>
                        <button type="submit" id="save-signage-modal" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>