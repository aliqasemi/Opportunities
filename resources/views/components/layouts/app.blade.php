<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livewire App</title>
    @livewireStyles
</head>
<body>
{{ $slot }}
@livewireScripts
</body>
</html>

<style>
    .opportunities-container {
        max-width: 600px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        color: #333;
    }

    .items-per-page {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }

    .items-per-page label {
        font-weight: bold;
        margin-right: 10px;
    }

    .per-page-select {
        padding: 5px 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    .refresh-button {
        padding: 5px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    .refresh-button:hover {
        background-color: #45a049;
    }

    .items-list .item {
        border: 1px solid #ddd;
        padding: 10px;
        margin-bottom: 8px;
        border-radius: 4px;
        background-color: #f9f9f9;
    }

    .pagination-links {
        display: flex;
        justify-content: center;
        margin-top: 15px;
    }

</style>
