
<div class="modal inmodal" id="banModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated flipInY">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Disqualify User</h4>
                <small class="font-bold">You are about to disqualify <span class="banUser"></span></small>
            </div>
            <form method="POST" id="banForm">
                {{ csrf_field() }}

                <div class="modal-body">
                    <p>You are about to disqualify <span class="banUser"></span>. Please write down a message so the the user knows why he/she has been disqualified.</p>

                    <textarea name="message" title="banmessage" style="width: 100%; height: 100px;"></textarea>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Disqualify</button>
                </div>
            </form>
        </div>
    </div>
</div>
