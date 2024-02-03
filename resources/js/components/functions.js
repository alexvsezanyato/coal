let priceBlock;

document.addEventListener("DOMContentLoaded", () => {
    priceBlock = document.querySelector("[data-js=price]")
})

export function updateTotalPriceHtml(price) {
    priceBlock.innerHTML = price
}

export async function updateTotalPrice(data) {
    const formData = new FormData()

    formData.append("product-id", data.productID)
    formData.append("amount", data.amount)

    let action = !data["amount"] ? "remove" : "add"

    formData.append("_token", csrf)

    let response = null

    try {
        response = await fetch(`/basket/${action}`, {
            method: "POST",
            body: formData,
            widthCredentials: true,
        })

        response = await response.json()
    } catch (e) {
        console.error(e)
    }

    if (response.price) {
        updateTotalPriceHtml(response.price)
    }
}

export function updateCarts(productID, amount, action) {
    const typeSelector = `[data-js="product"]`
    const IDSelector = `[data-id="${productID}"]`

    document.querySelectorAll(typeSelector + IDSelector)
        .forEach(e => {
            const amountInput = e.querySelector(".count input")
            if (amount) amountInput.value = amount

            const inCart = e.querySelector(".cart.in")
            const notInCart = e.querySelector(".cart.not-in")

            if (action === "add") {
                inCart.classList.remove("hidden")

                if (!notInCart.classList.contains("hidden")) {
                    notInCart.classList.add("hidden")
                }
            } else if (action === "remove") {
                notInCart.classList.remove("hidden")

                if (!inCart.classList.contains("hidden")) {
                    inCart.classList.add("hidden")
                }
            }
        })
}
