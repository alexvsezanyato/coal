import * as fn from "./functions.js"

document.addEventListener("DOMContentLoaded", () => {
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

        fn.updateTotalPrice({
            productID: product.dataset.id,
            amount: input.value
        })

        fn.updateCarts(product.dataset.id, input.value, "add")

        if (inCart && notInCart) {
            // inCart.classList.remove("hidden")
            // notInCart.classList.add("hidden")
        }
    })

    document.addEventListener("click", function(clickEvent) {
        const target = clickEvent.target.closest(`[data-js=togglable]`)
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

        let action = target.classList.contains("not-in") ? "add" : "remove"

        const amount = (action === "add")
            ? product.querySelector("[name=count]").value
            : 0

        fn.updateTotalPrice({
            productID: target.dataset.id,
            amount,
        })

        fn.updateCarts(target.dataset.id, amount, action)

        if (inCart && notInCart) {
            // inCart.classList.toggle("hidden")
            // notInCart.classList.toggle("hidden")
        }
    })
})
