<div class="grid 2xl:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-6">
    <div class="2xl:col-span-4 sm:col-span-2">
        <div class="card">
            <div class="card-header flex justify-between">
                <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-300">Make Safe</h4>
                <div class="flex items-center gap-2">

                    <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                        Close
                    </button>
                        
                    <button type="submit"
                        class="ml-2 bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                        Save
                    </button>
                </div>
            </div>

            <div class="flex flex-col">
                <div class="overflow-x-auto">
                    <div class="inline-block min-w-full align-middle">
                        <div class="overflow-hidden">
                            <h3 class="p-3 text-lg">Make Safe Forms</h3>

                            <div class="Structural_Stabilisation bg-white pl-6 pr-6 pb-6 rounded shadow-lg">

                                <!-- Structural Stabilisation -->
                                <div >
                                    <h3 class=" text-lg font-medium text-gray-700">Structural Stabilisation</h3>
                                    <div class="space-y-4 mt-4 grid grid-cols-1 md:grid-cols-3 gap-2">
                                        <!-- Date of Stabilisation -->
                                        <div class="mt-4">
                                            <label for="stabilisation-date" class="block text-sm font-medium text-gray-700">Date of Stabilisation</label>
                                            <input type="date" id="stabilisation-date" name="stabilisation-date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Location of Stabilisation -->
                                        <div>
                                            <label for="stabilisation-location" class="block text-sm font-medium text-gray-700">Location of Stabilisation</label>
                                            <input type="text" id="stabilisation-location" name="stabilisation-location" placeholder="Enter location" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Description of Structural Damage -->
                                        <div>
                                            <label for="stabilisation-damage" class="block text-sm font-medium text-gray-700">Description of Structural Damage</label>
                                            <textarea id="stabilisation-damage" name="stabilisation-damage" rows="1" placeholder="Describe the damage" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <!-- Type of Structural Stabilisation -->
                                        <div>
                                            <label for="stabilisation-type" class="block text-sm font-medium text-gray-700">Type of Structural Stabilisation Performed</label>
                                            <select id="stabilisation-type" name="stabilisation-type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select type</option>
                                                <option value="Reinforcement of Beams/Columns">Reinforcement of Beams/Columns</option>
                                                <option value="Crack Repair">Crack Repair</option>
                                                <option value="Bracing Installation">Bracing Installation</option>
                                                <option value="Foundation Repair">Foundation Repair</option>
                                                <option value="Sealing Joints">Sealing Joints</option>
                                            </select>
                                        </div>
                                        <!-- Materials Used for Stabilisation -->
                                        <div>
                                            <label for="stabilisation-materials" class="block text-sm font-medium text-gray-700">Materials Used for Stabilisation</label>
                                            <input type="text" id="stabilisation-materials" name="stabilisation-materials" placeholder="Enter materials" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Photos of Structural Stabilisation -->
                                        <div>
                                            <label for="stabilisation-photos" class="block text-sm font-medium text-gray-700">Photos of Structural Stabilisation</label>
                                            <input type="file" id="stabilisation-photos" name="stabilisation-photos[]" multiple class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Comments/Notes from Technician -->
                                        <div>
                                            <label for="stabilisation-comments" class="block text-sm font-medium text-gray-700">Comments/Notes from Technician</label>
                                            <textarea id="stabilisation-comments" name="stabilisation-comments" rows="1" placeholder="Any additional observations or recommendations" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <!-- Signature of Technician -->
                                        <div>
                                            <label for="signature-canvas" class="block text-sm font-medium text-gray-700">Signature of Technician</label>
                                            <canvas id="signature-canvas" class="mt-1 block w-full h-32 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></canvas>
                                            <button id="clear-signature" class="mt-2 bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600">Clear Signature</button>
                                        </div>

                                        
                                    </div>
                                </div>
                            
                                <hr class="mt-4">
                                <!-- Electrical Isolation -->
                                <div>
                                    <h3 class="mt-4 text-lg font-medium text-gray-700">Electrical Isolation</h3>
                                    <div class="space-y-4 mt-4  grid grid-cols-1 md:grid-cols-3 gap-2">
                                        <!-- Date of Isolation -->
                                        <div class="mt-4">
                                            <label for="isolation-date" class="block text-sm font-medium text-gray-700">Date of Isolation</label>
                                            <input type="date" id="isolation-date" name="isolation-date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Location of Isolation -->
                                        <div>
                                            <label for="isolation-location" class="block text-sm font-medium text-gray-700">Location of Isolation</label>
                                            <input type="text" id="isolation-location" name="isolation-location" placeholder="Enter location" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Type of Electrical Isolation -->
                                        <div>
                                            <label for="isolation-type" class="block text-sm font-medium text-gray-700">Type of Electrical Isolation Performed</label>
                                            <select id="isolation-type" name="isolation-type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select type</option>
                                                <option value="Main Power Isolation">Main Power Isolation</option>
                                                <option value="Equipment Isolation">Equipment Isolation</option>
                                                <option value="Panel Isolation">Panel Isolation</option>
                                            </select>
                                        </div>
                                        <!-- Reason for Isolation -->
                                        <div>
                                            <label for="isolation-reason" class="block text-sm font-medium text-gray-700">Reason for Isolation</label>
                                            <textarea id="isolation-reason" name="isolation-reason" rows="1" placeholder="Explain the reason for isolation" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <!-- Photos of Electrical Isolation -->
                                        <div>
                                            <label for="isolation-photos" class="block text-sm font-medium text-gray-700">Photos of Electrical Isolation</label>
                                            <input type="file" id="isolation-photos" name="isolation-photos[]" multiple class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Comments/Notes from Technician -->
                                        <div>
                                            <label for="isolation-comments" class="block text-sm font-medium text-gray-700">Comments/Notes from Technician</label>
                                            <textarea id="isolation-comments" name="isolation-comments" rows="1" placeholder="Any additional observations or recommendations" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <!-- Signature of Technician -->
                                        <div>
                                            <label for="isolation-signature" class="block text-sm font-medium text-gray-700">Signature of Technician</label>
                                            <input type="text" id="isolation-signature" name="isolation-signature" placeholder="Technician Signature" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-4">
                                <!-- Debris Removal -->
                                <div>
                                    <h3 class="mt-4 text-lg font-medium text-gray-700">Debris Removal</h3>
                                    <div class="space-y-4 mt-4 grid grid-cols-1 md:grid-cols-3 gap-2">
                                        <!-- Date of Removal -->
                                        <div class="mt-4">
                                            <label for="removal-date" class="block text-sm font-medium text-gray-700">Date of Removal</label>
                                            <input type="date" id="removal-date" name="removal-date" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Location of Debris Removal -->
                                        <div>
                                            <label for="removal-location" class="block text-sm font-medium text-gray-700">Location of Debris Removal</label>
                                            <input type="text" id="removal-location" name="removal-location" placeholder="Enter location" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Type of Debris Removed -->
                                        <div>
                                            <label for="removal-type" class="block text-sm font-medium text-gray-700">Type of Debris Removed</label>
                                            <select id="removal-type" name="removal-type" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                                <option value="">Select type</option>
                                                <option value="Building Material Debris">Building Material Debris</option>
                                                <option value="Wood Debris">Wood Debris</option>
                                                <option value="Plastic Debris">Plastic Debris</option>
                                                <option value="Metal Debris">Metal Debris</option>
                                            </select>
                                        </div>
                                        <!-- Quantity of Debris Removed -->
                                        <div>
                                            <label for="removal-quantity" class="block text-sm font-medium text-gray-700">Quantity of Debris Removed</label>
                                            <input type="number" id="removal-quantity" name="removal-quantity" placeholder="Enter quantity" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Photos of Debris Removal -->
                                        <div>
                                            <label for="removal-photos" class="block text-sm font-medium text-gray-700">Photos of Debris Removal</label>
                                            <input type="file" id="removal-photos" name="removal-photos[]" multiple class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                        </div>
                                        <!-- Comments/Notes from Technician -->
                                        <div>
                                            <label for="removal-comments" class="block text-sm font-medium text-gray-700">Comments/Notes from Technician</label>
                                            <textarea id="removal-comments" name="removal-comments" rows="1" placeholder="Any additional observations or recommendations" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                                        </div>
                                        <!-- Signature of Technician -->
                                        <div>
                                            <label for="signature-canvas" class="block text-sm font-medium text-gray-700">Signature of Technician</label>
                                            <canvas id="signature-canvas2" class="mt-1 block w-full h-32 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></canvas>
                                            <button id="clear-signature2" class="mt-2 bg-red-500 text-white px-4 py-2 rounded-md shadow-sm hover:bg-red-600">Clear Signature</button>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const canvas = document.getElementById('signature-canvas');
    const context = canvas.getContext('2d');

    canvas.width = 400;
    canvas.height = 150;

    let isDrawing = false;

    canvas.addEventListener('mousedown', (e) => {
        isDrawing = true;
        context.beginPath();
        context.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener('mousemove', (e) => {
        if (isDrawing) {
            context.strokeStyle = '#3b82f6';  // Change color as needed
            context.lineWidth = 2;
            context.lineCap = 'round';
            context.lineTo(e.offsetX, e.offsetY);
            context.stroke();
        }
    });

    canvas.addEventListener('mouseup', () => {
        isDrawing = false;
        context.closePath();
    });

    canvas.addEventListener('mouseout', () => {
        isDrawing = false;
    });

    // Clear the canvas when the button is clicked
    document.getElementById('clear-signature').addEventListener('click', () => {
        context.clearRect(0, 0, canvas.width, canvas.height);
    });
</script>

<script>
   const canvas2 = document.getElementById('signature-canvas2'); // Select the canvas by ID
const context2 = canvas2.getContext('2d');

canvas2.width = 400;
canvas2.height = 150;

let isDrawing2 = false;

// Handle mouse events
canvas2.addEventListener('mousedown', (e) => {
    isDrawing2 = true;
    const rect = canvas2.getBoundingClientRect();
    const offsetX = e.clientX - rect.left;
    const offsetY = e.clientY - rect.top;
    context2.beginPath();
    context2.moveTo(offsetX, offsetY);
});

canvas2.addEventListener('mousemove', (e) => {
    if (isDrawing2) {
        const rect = canvas2.getBoundingClientRect();
        const offsetX = e.clientX - rect.left;
        const offsetY = e.clientY - rect.top;
        context2.strokeStyle = '#3b82f6';  // Stroke color
        context2.lineWidth = 2;           // Line width
        context2.lineCap = 'round';       // Smooth line ends
        context2.lineTo(offsetX, offsetY);
        context2.stroke();
    }
});

canvas2.addEventListener('mouseup', () => {
    isDrawing2 = false;
    context2.closePath();
});

canvas2.addEventListener('mouseout', () => {
    isDrawing2 = false;
});

// Clear button logic
document.getElementById('clear-signature2').addEventListener('click', () => {
    context2.clearRect(0, 0, canvas2.width, canvas2.height);
});

</script>