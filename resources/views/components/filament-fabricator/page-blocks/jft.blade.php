@aware(['page'])
<div class="px-4 py-4 md:py-8">
    <div class="max-w-7xl mx-auto">
        <div class="iframe-wrapper min-h-screen rounded-lg shadow-lg overflow-hidden bg-white">
            <iframe
                src="https://www.jftna.org/jft/index.php"
                frameborder="0"
                sandbox=""
                class="bg-white"
            ></iframe>
        </div>
    </div>
</div>

<style>
    .iframe-wrapper {
        position: relative;
        padding-bottom: 75%; /* Adjust this value to control aspect ratio (e.g., 56.25% for 16:9) */
        height: 0;
        overflow: hidden;
    }

    .iframe-wrapper iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
    }
</style>