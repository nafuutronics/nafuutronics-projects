<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-light">
          <h5 class="modal-title" id="deleteModalLabel"></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="" id="deleteLink" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
</div>

<script>
    function setModalData(title, message, confirmLink, buttonName, color) {
        // console.log("Hey wats up!!");
        modalHeader = document.getElementsByClassName('modal-header')[0];
        deleteLink = document.getElementById('deleteLink');

        document.getElementsByClassName('modal-title')[0].innerHTML = title;
        document.getElementsByClassName('modal-body')[0].innerHTML = message;
        deleteLink.href = confirmLink;

        removeClassByPrefix(modalHeader, 'bg-');
        removeClassByPrefix(deleteLink, 'btn-');

        // Optional values for color
        if (color) {
            modalHeader.classList.add('bg-' + color);
            deleteLink.classList.add('btn-' + color);
        }
        else {
            modalHeader.classList.add('bg-danger');
            deleteLink.classList.add('btn-danger');
        }

        // Optional values for button name
        if (buttonName)
            deleteLink.innerHTML = (buttonName);
        else
            deleteLink.innerHTML = ('Delete');

    }

    function removeClassByPrefix(node, prefix) {
        var regx = new RegExp('\\b' + prefix + '[^ ]*[ ]?\\b', 'g');
        node.className = node.className.replace(regx, '');
        return node;
    }
</script>
