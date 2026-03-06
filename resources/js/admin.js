import './bootstrap'
import flatpickr from "flatpickr";
import { Japanese } from "flatpickr/dist/l10n/ja.js";
import "flatpickr/dist/flatpickr.min.css";

const searchForm = document.getElementById('search_form')
const searchFormShop = document.getElementById('search_form_shop')
const searchFormPublic = document.getElementById('search_form_public')
const searchFormLimit = document.getElementById('search_form_limit')
if (searchFormShop) {
  searchFormShop.addEventListener('change', () => {
    searchForm.submit()
  })
}
if (searchFormPublic) {
  searchFormPublic.addEventListener('change', () => {
    searchForm.submit()
  })
}
if (searchFormLimit) {
  searchFormLimit.addEventListener('change', () => {
    searchForm.submit()
  })
}

// Initialize flatpickr for recruit application date inputs
document.addEventListener('DOMContentLoaded', function () {
  const dateFromInput = document.querySelector('input[data-date-from]');
  const dateToInput = document.querySelector('input[data-date-to]');
  
  if (dateFromInput || dateToInput) {
    const flatpickrOptions = {
      dateFormat: "Y-m-d", // Backend expects Y-m-d format
      locale: Japanese,
      allowInput: true,
      disableMobile: true,
      monthSelectorType: "static",
      yearSelectorType: "static",
    };

    if (dateFromInput) {
      flatpickr(dateFromInput, {
        ...flatpickrOptions,
        onChange: function(selectedDates, dateStr) {
          if (dateToInput && dateStr) {
            const dateToPicker = dateToInput._flatpickr;
            if (dateToPicker) {
              dateToPicker.set('minDate', dateStr);
            }
          }
        }
      });
    }

    if (dateToInput) {
      const dateFromValue = dateFromInput?.value;
      flatpickr(dateToInput, {
        ...flatpickrOptions,
        minDate: dateFromValue || undefined,
        onChange: function(selectedDates, dateStr) {
          if (dateFromInput && dateStr) {
            const dateFromPicker = dateFromInput._flatpickr;
            if (dateFromPicker) {
              dateFromPicker.set('maxDate', dateStr);
            }
          }
        }
      });
    }
  }
});

const castProfileUrlOrigin = document.getElementById('cast_profile_url_origin')
const castProfileUrlPath = document.getElementById('cast_profile_url_path')
document.addEventListener('DOMContentLoaded', () => {
  if (!castProfileUrlOrigin || !castProfileUrlPath) return
  castProfileUrlPath.style.paddingLeft = `${castProfileUrlOrigin.offsetWidth + 12}px`
})

class Modal {
  constructor(params) {
    this.modal = document.querySelector(params.modal)
    this.opener = document.querySelector(params.opener)

    if (!this.modal || !this.opener) return

    this.closer = this.modal.querySelectorAll(params.closer)

    if (!this.closer) return

    this.opener.addEventListener('click', () => this.open())
    this.closer.forEach((el) => {
      el.addEventListener('click', () => this.close())
    })
  }

  open() {
    this.modal.style.display = 'flex'
  }

  close() {
    this.modal.style.display = 'none'
  }
}

new Modal({
  modal: '#deleteModal',
  opener: '#deleteModalOpener',
  closer: '.modal-close-btn',
})

new Modal({
  modal: '#publishModal',
  opener: '#publishModalOpener',
  closer: '.modal-close-btn',
})

new Modal({
  modal: '#unpublishModal',
  opener: '#unpublishModalOpener',
  closer: '.modal-close-btn',
})
