const SliderPartnerWrapClassname = "partners-slider"
const SliderPartnerClassname = "partners-slider-content"

function createDotItemElement (index) {
    const dotElement = document.createElement('div')
    dotElement.className = "slider-dot-item"
    if (index === 0) {
        dotElement.classList.add("active")
    }
    dotElement.addEventListener('click', function (e) {
        const dotItems = document.getElementsByClassName("slider-dot-item")
        Array.from(dotItems).map(item => {
            item.classList.remove("active")
            return null
        })
        e.target.classList.add("active")
        const parent = document.getElementsByClassName(SliderPartnerClassname)[0]
        parent.style.transform = `translateX(-${index * 100}%)`
    })
    return dotElement
}

function initSliderDot () {
    const parent = document.getElementsByClassName(SliderPartnerWrapClassname)[0]

    const items = document.querySelectorAll(`.${SliderPartnerClassname} .items .item`)
    const dotCount = Math.ceil(items.length / 3)

    const dotsElement = document.createElement('div')
    dotsElement.className = "slider-dots"
    Array.from(Array(dotCount).keys()).map(item => {
        const element = createDotItemElement(item)
        dotsElement.appendChild(element)
        return null
    })
    parent.appendChild(dotsElement)
}

initSliderDot()