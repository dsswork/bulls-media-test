<x-admin.layout title="Main Page">
    <div>
        <p>Navigate to <a href="https://console.cloud.google.com/apis/dashboard">Google Developers Console</a></p>
        <h5>1. Enable API services</h5>
        <p>Click ENABLE API AND SERVICES.</p>
        <p>Search for <b><a href="https://console.cloud.google.com/apis/library/drive.googleapis.com">Google Drive API</a></b> and Enable it.</p>
        <p>Search for <b><a href="https://console.cloud.google.com/apis/library/sheets.googleapis.com">Google Sheets API</a></b> and Enable it.</p>
        <h5>2. Create Service account</h5>
        <p>Create a new Service account key from Credentials.</p>
        <p>Give your service account a name.</p>
        <p>Under Grant this service account access to project step click on Select a Role dropdown and choose Project
            from left side and Editor from right side</p>
        <p>Click Continue then Done.</p>
        <p>Edit the service account and go to Keys tab.</p>
        <p>Create a new Key of type JSON, and upload this json file to your connection.</p>
        <h5>3. Create and share Spreadsheet</h5>
        <p>Create/Open a Google Spreadsheet file. Give the sheet a name.</p>
        <p>Copy the Email of the recently created Service Account.
        <p>Share the sheet with the Service Account email as Editor.
    </div>
</x-admin.layout>
