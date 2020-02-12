<?php


			$bucketName = 'bucketName';

			$IAM_KEY = 'IAM_KEY';
			$IAM_SECRET = 'IAM_SECRET';

			$s3 = S3Client::factory(
			array(
				'credentials' => array(
					'key' => $IAM_KEY,
					'secret' => $IAM_SECRET
				),
				'version' => 'latest',
				'region'  => 'us-east-2'
			  )
		    );

 
			$keyName = 'resources/'.time().'_'.$_FILES["uploaded_file"]['name'];
			$file = $_FILES["uploaded_file"]['tmp_name'];
	        $pathInS3 = 'https://s3.us-east-2.amazonaws.com/'.$bucketName.'/'.$keyName;

			$s3->putObject(
				array(
					'Bucket'=>$bucketName,
					'Key' =>  $keyName,
					'SourceFile' => $file,
					'StorageClass' => 'REDUCED_REDUNDANCY'
				)
			);


?>
