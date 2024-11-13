@extends('header')

@section('avto_content')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Автомобили - driveGo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app1.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/carFilter.js') }}"></script>
</head>

<body>
    <!-- Фильтры для поиска автомобилей -->
    <section class="container my-4">
    <h2 class="text-center">АВТОМОБИЛИ</h2>
    <form id="filterForm" method="GET" action="{{ route('cars.filter') }}" class="row g-3">
        <div class="col-md-4">
            <label for="classFilter" class="form-label">Класс</label>
            <select id="classFilter" name="class" class="form-select">
                <option value="">Все классы</option>
                <option value="Эконом">Эконом</option>
                <option value="Бизнес">Бизнес</option>
                <option value="Внедорожник">Внедорожник</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="transmissionFilter" class="form-label">Трансмиссия</label>
            <select id="transmissionFilter" name="transmission" class="form-select">
                <option value="">Все трансмиссии</option>
                <option value="Автоматическая">Автоматическая</option>
                <option value="Механическая">Механическая</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="driveTypeFilter" class="form-label">Привод</label>
            <select id="driveTypeFilter" name="drive_type" class="form-select">
                <option value="">Все приводы</option>
                <option value="Передний">Передний</option>
                <option value="Задний">Задний</option>
                <option value="Полный">Полный</option>
            </select>
        </div>
        <div class="col-md-12 mt-3">
        <button type="button" id="filterButton" class="btn btn-primary">Фильтровать</button>
    </div>
    </form>
    <div class="row mt-4" id="car-results">
        @foreach ($cars as $car)
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-name text-center">{{ $car->name }}</h5> <!-- Название автомобиля над картинкой -->
                    <img src="{{ $car->image }}" class="card-img-top" alt="{{ $car->name }}">
                    <div class="card-body">
                        <p class="card-text">{{ $car->description }}</p>
                        <p class="card-text"><strong>{{ $car->price }} ₽</strong></p>
                        <a href="{{ route('cars.show', $car->id) }}" class="btn btn-outline-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
document.getElementById('filterButton').addEventListener('click', function() {
    let classFilter = document.getElementById('classFilter').value;
    let transmissionFilter = document.getElementById('transmissionFilter').value;
    let driveTypeFilter = document.getElementById('driveTypeFilter').value;

    fetch("{{ route('cars.filter') }}?class=" + classFilter + "&transmission=" + transmissionFilter + "&drive_type=" + driveTypeFilter)
        .then(response => response.json())
        .then(data => {
            document.getElementById('car-results').innerHTML = data.html;
        })
        .catch(error => console.error('Error:', error));
});
    </script>

<section class="widget_section" id="contact-us">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="footer_widget section-padding">
                    <a class="navbar-brand" href=""><ya-tr-span data-index="123-0" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="drive" data-translation="drive" data-ch="0" data-type="trSpan" style="visibility: inherit !important;">drive</ya-tr-span><span style="color:#04DBC0"><ya-tr-span data-index="123-1" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="Go" data-translation="Вперед" data-ch="0" data-type="trSpan" style="visibility: inherit !important;">Go</ya-tr-span></span><ya-tr-span data-index="123-2" data-translated="true" data-source-lang="en" data-target-lang="ru" data-value="" data-translation="" data-ch="0" data-type="trSpan" style="visibility: inherit !important;"> </ya-tr-span></a>
                    <p>Путешествие с хорошими друзьями подарит<br>вам незабываемые впечатления.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
    <div class="footer_widget">
        <h3>Контактная информация</h3>
        <ul class="contact_info section-padding">
            <li>
                <i class="fas fa-map-marker-alt"></i> Воронеж, ул.Колесниченко, 15
            </li>
            <li>
                <i class="far fa-envelope"></i> contact@carrental.com
            </li>
            <li>
                <i class="fas fa-phone-alt"></i> +7 (654) 128-09-87
            </li>
        </ul>
    </div>
</div>

            <div class="col-lg-4 col-md-6">

  <div class="footer_widget section-padding">
    <h3>Рассылка</h3>
    <p style="margin-bottom:0px">Ничего не пропустите! Подпишитесь, чтобы получать ежедневные предложения</p>
    
    <div class="subscribe_form">
      <!-- Форма с полем для email и кнопкой -->
      <form id="subscribeForm" class="subscribe_form" novalidate>
        <input type="email" name="EMAIL" id="subs-email" class="form_input" placeholder="Почта..." required>
        <button type="button" id="subscribeButton" class="btn btn-primaary">ПОДПИСАТЬСЯ</button>
        <div class="clearfix"></div>
      </form>
    </div>
  </div>
</div>

<!-- Уведомление о подписке -->
<div id="subscribeConfirmation" class="alert text-center" 
     style="display: none; position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1060; background-color: #28a745; color: #fff; border-radius: 8px; padding: 15px 30px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); border: none; max-width: 500px; width: 90%;">
  Спасибо за подписку! Подтверждение отправлено на вашу почту.
</div>

<script>
  // Функция для показа уведомления
  function subscribeUser() {
    const emailField = document.getElementById("subs-email");
    const confirmationMessage = document.getElementById("subscribeConfirmation");

    // Проверяем, заполнен ли email
    if (emailField.checkValidity()) {
      // Показываем уведомление
      confirmationMessage.style.display = "block";

      // Скрываем уведомление через 3 секунды
      setTimeout(() => {
        confirmationMessage.style.display = "none";
      }, 3000);

      // Очищаем поле ввода
      emailField.value = "";
    } else {
      // Показываем сообщение об ошибке, если email некорректен
      emailField.reportValidity();
    }
  }

  // Добавляем обработчик события для кнопки
  document.getElementById("subscribeButton").addEventListener("click", subscribeUser);
</script>
</section>

<footer class="footer_section">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<div class="copyright">
							driveGo© 
							<script type="text/javascript"> 
								document.write(new Date().getFullYear())
							</script>
							Все правы защищены
						</div>
					</div>
				</div>
			</div>
		</footer>

</body>

@endsection