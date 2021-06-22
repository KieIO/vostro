const SliderPartnerWrapClassname = "partners-slider"
const SliderPartnerClassname = "partners-slider-content"

function createDotItemElement(index) {
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

function initSliderDot() {
    const parent = document.getElementsByClassName(SliderPartnerWrapClassname)[0]
    const itemsWrap = document.querySelector(`.${SliderPartnerClassname} .items`)
    const items = document.querySelectorAll(`.${SliderPartnerClassname} .items .item`)
    const dotCount = Math.ceil(items.length / 3)

    itemsWrap.setAttribute('widthmobile', `${dotCount * 100}%`)
    if (window.innerWidth <= 641) {
        itemsWrap.style.width = `${dotCount * 100}%`
    }

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

function onResizeScreen() {
    const parent = document.getElementsByClassName(SliderPartnerWrapClassname)[0]
    const itemsWrap = document.querySelector(`.${SliderPartnerClassname} .items`)
    if (parent && itemsWrap) {
        if (window.innerWidth <= 641) {
            parent.style.transform = `translateX(0)`
            itemsWrap.style.width = itemsWrap.getAttribute('widthmobile')
        } else {
            parent.style.transform = `translateX(0)`
            itemsWrap.style.width = "100%"
        }
    }
}

window.addEventListener("resize", onResizeScreen);