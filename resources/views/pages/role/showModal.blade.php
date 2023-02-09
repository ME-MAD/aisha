<div class="modal fade" id="showRoleModal" tabindex="-1" role="dialog" aria-labelledby="showRoleModal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header p-3 mb-2 bg-dark  ">
                <h5 class="modal-title text-white font-weight-bold" >Users</h5>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered mb-4">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Data comes from AJAX --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>