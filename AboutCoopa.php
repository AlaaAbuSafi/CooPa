<?php 
	session_start();

	if (!isset($_SESSION['UserName'])) {
		header('location: index.php');
	}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>عن الجمعية</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="assets/css/imports.css" media="screen">
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" media="screen">
	</head>

	<body class="single single-post no-hero-image">

		<div id="top"></div>

		<?php 
		require_once 'layouts/header.php';
		 ?>

		<!-- Main Section
		================================================== -->

		<section class="main container">
			<div class="row">
				<div class="col-sm-8 col-sm-push-4 col-lg-9 col-lg-push-3">
					<header class="page-header">
						<h2 style="text-align: right;: ">الجمعية التعاونية الفلسطينية الريادية للتوفير والتسليف</h2>
					</header>
					<article class="pagehentry">
						<div class="entry-summary">
							<div style="text-align: right;:">
							<h6>اسم الجمعية: الجمعية التعاونية الفلسطينية الريادية للتوفير والتسليف</h6>
							<h6>عنوان الجمعية: فلسطين – الخليل – عين سارة</h6>
							<h6>منطقة العمل:- فلسطين</h6>
							<h6>مركز الجمعية:- الخليل</h6>

						</div>
						<div class="entry-content">
							<p><img style="align-content: left" src="assets/images/homePage.png" alt="" title="" width="315"></p>
							<h3 style="text-align: right">صفتها</h3>
							<h4 style="text-align: right">
								مؤسسة تعاونية، لها صفتها الإعتبارية اربتط أعضاؤها طوعا بصفاتهم الإنسانية تمول وتدار و تراقب من قبل أعضائها بطريقة
								شفافة لتلبية احتياجاتهم المشتركة وطموحاتهم المستقبلية وفقا للمبادئ والقيم والاخالق التعاونية ولها أن تملك الألموال المنقولة
								وغير المنقولة وأن تبرم العقود والاتفاقيات وتوقع الرهون وأن تكون طرفا في الدعاوى التي تقيمها أو تقام عليها، وأن تمارس كافة الأعمال التي تمكنها من تحقيق أهدافها وفقا لقانون التعاون و الأنظمة الصادرة بمقتضاه و القوانين المرعية السائدة في
								فلسطين </h4>
															<h3 style="text-align: right">أهداف الجمعية</h3>
															<h4 style="text-align: right">تلبية احتياجات الأعضاء وفقا لأغراض الجمعية والتي تهدف لتحسين أوضاعهم الإقتصادية والجتماعية والثقافية والبيئية
								وتنظيمهم وفقا للمبادئ والقيم التعاونية القائمة والمساعدة الذاتية والاعتماد على الذات والشفافية والمساواة والعدالة والتضامن
								وتفعيل دور الأعضاء من خال ل مشاركتهم في العملية الانتاجية من خالل الانشطة التالية:
								 </h4>
								 <h5 style="text-align: right">تقديم الضمانات اللازمة لحصول الجمعية على مشاريع ومساعدات من الجهات الداعمة الداخلية والخارجية.

								<h5 style="text-align: right">تشجيع الاعضاء على التوفير من دخلهم الشهري وذلك عبر دفعات يتم تسديدها للجمعية.</h5> 
								<h5 style="text-align: right">إدارة مشاريع الجمعية المتمثلة في عقود المضاربة الاسالمية والمرابحة الاسالمية بدءا بمشاريع التشطيب والبناء او اي
								مشاريع تتبناها الهيئة العمومية.
								</h5>
								<h5 style="text-align: right">التعاون مع الجمعيات التعاونية الاخرى لتحقيق غاياتها وتعزيز دور العمل التعاوني.
								</h5>
								<h5 style="text-align: right">العمل على نشر الوعي الثقافة التعاونية وتوفير المعلومات الالزمة لأعضائها.
								</h5>
								<br>
								<br>
						</div>
					</article>
				</div>
				</div>

		<!-- Contact Us -->
		<?php 
		require_once 'layouts/contact.php';
		 ?>

        <!-- Footer -->
		<?php 
		require_once 'layouts/footer.php';
		 ?>

		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/custom.js"></script>
	</body>
</html>

