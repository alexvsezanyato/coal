document.addEventListener("DOMContentLoaded", () => {
    const priceBlock = document.querySelector("[data-js=price]")

    function updateTotalPriceHtml(price) {
        priceBlock.innerHTML = price
    }

    function updateTotalPrice(data, onload = false) {
        const formData = new FormData()

        formData.append("product-id", data.productId)
        formData.append("amount", data.amount)

        if (!data["amount"]) action = "remove"
        else action = "add"

        formData.append("_token", csrf)

        fetch(`/basket/${action}`, {
            method: "POST",
            body: formData,
            widthCredentials: true,
        }).then(r => r.json()).then(response => {
            if (response.price) {
                updateTotalPriceHtml(response.price)
            }
        })
    }

    document.addEventListener("click", function(clickEvent) {
        const selectedOption = clickEvent.target.closest(".option")
        const isOption = selectedOption ? true : false

        if (!isOption) return

        const counter = selectedOption.closest(".count")
        const optionType = selectedOption.getAttribute("data-option-type")
        const input = counter.querySelector(".value")
        const product = clickEvent.target.closest("[data-js=product]")
        const inCart = product.querySelector(".in")
        const notInCart = product.querySelector(".not-in")

        if (optionType === "+") {
            input.value++;
        } else if (optionType === "-" && input.value > 1) {
            input.value--;
        }

        updateTotalPrice({
            productId: product.getAttribute("data-id"),
            amount: input.value
        })

        inCart.classList.remove("hidden")
        notInCart.classList.add("hidden")
    })

    document.addEventListener("click", function(clickEvent) {
        const target = clickEvent.target.closest(`[data-js=togglable]`)
        // if (target.dataset.js !== "togglable") return
        if (!target) return

        const wrapper = target.closest(".cart-wrapper")
        const product = target.closest("[data-js=product]")

        if (!product) {
            console.error("Product block is not found")
            return
        }

        if (!wrapper) return

        const inCart = wrapper.querySelector(".in")
        const notInCart = wrapper.querySelector(".not-in")

        if (target.classList.contains("not-in")) {
            action = "add"
        } else {
            action = "remove"
        }

        const productID = target.dataset.id

        const data = new FormData()

        data.append("product-id", productID)
        data.append("_token", csrf)

        if (action === "add") {
            const amount = product.querySelector("[name=count]").value
            data.append("amount", amount)
        }

        const request = new XMLHttpRequest()

        request.onload = function() {
            let response = null

            try {
                response = JSON.parse(request.responseText)
            } catch (e) {
                console.error(e)
                return
            }

            if (!response.status) return

            if (response.price) {
                updateTotalPriceHtml(response.price)
            }

            inCart.classList.toggle("hidden")
            notInCart.classList.toggle("hidden")
        }

        request.open("POST", `/basket/${action}`)
        request.send(data)
    })

    document.addEventListener("click", function(clickEvent) {
        const target = clickEvent.target
        if (target.dataset.js !== "removable") return

        const productContainer = target.closest("[data-js=product-container]")

        const productID = target.dataset.id
        const data = new FormData()

        data.append("product-id", productID)
        data.append("_token", csrf)

        const request = new XMLHttpRequest()

        request.onload = function() {
            let response = null

            try {
                response = JSON.parse(request.responseText)
            } catch (e) {
                console.error(e)
                return
            }

            if (!response.status) return

            if (response.price) {
                updatePrice(response.price)
            }

            if (!productContainer) {
                console.error("The product conainter isn't found")
                return
            }

            productContainer.remove()
        }

        request.open("POST", `/basket/remove`)
        request.send(data)
    })
})
