const updateQuantity = async (id, e) => {
    let quantity = e.target.value;
    try {
        const response = await fetch(
            `cart/updateQuantity/id/${id}/quantity/${quantity}`
        );
        const data = await response.json();

        if (data) {
            location.reload();
        } else {
            console.log("Update failed");
        }
    } catch (error) {
        console.error("Error:", error);
    }
};
