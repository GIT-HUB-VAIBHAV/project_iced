function searchRecords() {
    var searchQuery = document.getElementById("search-input").value;

    fetch(`search_records.php?searchQuery=${searchQuery}`)
        .then(response => response.json())
        .then(data => {
            displayRecords(data);
        })
        .catch(error => {
            console.error("Error searching records:", error);
        });
}

function viewRecord(recordId) {
    // Redirect to view_report.php with the record ID
    window.open(`view_report.php?recordId=${recordId}`, '_blank');
}

function editRecord(recordId) {
    window.open(`edit_form.php?recordId=${recordId}`, '_blank');
}

function deleteRecord(recordId) {
    var confirmation = confirm("Are you sure you want to delete this record?");
    if (confirmation) {
        fetch(`delete_record.php?recordId=${recordId}`, {
            method: 'DELETE',
        })
        .then(response => {
            if (response.ok) {
                loadRecords(); // Refresh the records after deletion
            } else {
                console.error("Error deleting record.");
            }
        })
        .catch(error => {
            console.error("Error deleting record:", error);
        });
    }
}



// Define the displayRecords function
function displayRecords(records) {
    var recordsContainer = document.getElementById("records-container");
    recordsContainer.innerHTML = ""; // Clear previous results

    if (records.length === 0) {
        recordsContainer.innerHTML = "No records found.";
        return;
    }

    records.forEach(record => {
        var recordDiv = document.createElement("div");
        recordDiv.className = "record";
        recordDiv.innerHTML = `<span>Name: ${record.name}</span><br>
                               <span>Email: ${record.email}</span><br>
                               <span>Phone: ${record.phone}</span><br>
                               <span>Address: ${record.address}</span><br>
                               <button onclick="editRecord(${record.id})">Edit</button>
                               <button onclick="deleteRecord(${record.id})">Delete</button>
                               <button onclick="viewRecord(${record.id})">View</button>`;

        recordsContainer.appendChild(recordDiv);
    });
}
