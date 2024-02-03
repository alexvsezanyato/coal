document.addEventListener("DOMContentLoaded", () => {
    const resultNode = document.querySelector(".result")
    resultNode.style.display = "none"
    let animationHasBeenStarted = false

    function showFormResult(target, status, message) {
        if (animationHasBeenStarted) return
        animationHasBeenStarted = true

        const resultNode = target.querySelector(".result")
        const messageNode = resultNode.querySelector(".message")

        messageNode.replaceChildren(document.createTextNode(message))

        resultNode.style.display = "flex"
        resultNode.style.opacity = "0"
        resultNode.style.transform = "scale(0.95)"
        target.style.pointerEvents = "none";

        requestAnimationFrame(() => {
            setTimeout(() => {
                resultNode.style.transform = "scale(1)"

                resultNode.setAttribute("data-visible", "true")
                resultNode.setAttribute("data-status", status)

                resultNode.style.opacity = "1"
            })
        })

        setTimeout(() => {
            resultNode.style.transform = "scale(0.95)"
            resultNode.style.opacity = "0"
        }, 4000)

        setTimeout(() => {
            resultNode.style.display = "none"

            resultNode.removeAttribute("data-status")
            resultNode.removeAttribute("data-visible")
            target.style.pointerEvents = "all";
            animationHasBeenStarted = false
        }, 4000 + 200)
    }

    document.addEventListener("submit", async e => {
        e.preventDefault()

        const body = new FormData(e.target)
        body.append("ajax", true)

        const response = await fetch(e.target.action, {
            method: "POST",
            body,
        })

        let result = ""

        try {
            result = await response.json()
        } catch (error) {
            showFormResult(e.target, "error", "Что - то пошло не так, попробуйте позже")
            result = ""
        }

        if (result && result.status === "success") {
            showFormResult(e.target, result.status, result.message || "Ваша заявка принята")
        }
    })
})
