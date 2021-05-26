<?php namespace Framework\Validation;

class FilesValidator
{
	protected static ?array $files = null;

	/**
	 * Get $_FILES in an re-organized way.
	 *
	 * @see https://stackoverflow.com/a/33261775/6027968
	 *
	 * @return array
	 */
	protected static function getOrganizedFiles() : array
	{
		if (static::$files !== null) {
			return static::$files;
		}
		$walker = static function ($array, $fileInfokey, callable $walker) {
			$return = [];
			foreach ($array as $k => $v) {
				if (\is_array($v)) {
					$return[$k] = $walker($v, $fileInfokey, $walker);
					continue;
				}
				$return[$k][$fileInfokey] = $v;
			}
			return $return;
		};
		$files = [];
		foreach ($_FILES as $name => $values) {
			if ( ! isset($files[$name])) {
				$files[$name] = [];
			}
			if ( ! \is_array($values['error'])) {
				$files[$name] = $values;
				continue;
			}
			foreach ($values as $fileInfoKey => $subArray) {
				$files[$name] = \array_replace_recursive(
					$files[$name],
					$walker($subArray, $fileInfoKey, $walker)
				);
			}
		}
		return static::$files = $files;
	}

	protected static function getFile(string $field) : array | null
	{
		$files = static::getOrganizedFiles();
		return \ArraySimple::value($field, $files);
	}

	/**
	 * Validates file is uploaded.
	 *
	 * @param string $field
	 * @param array  $data
	 *
	 * @return bool
	 */
	public static function uploaded(string $field, array $data = []) : bool
	{
		$file = static::getFile($field);
		if ($file === null) {
			return false;
		}
		return $file['error'] === \UPLOAD_ERR_OK && \is_uploaded_file($file['tmp_name']);
	}

	/**
	 * Validates file size.
	 *
	 * @param string $field
	 * @param array  $data
	 * @param int    $kilobytes
	 *
	 * @return bool
	 */
	public static function maxSize(string $field, array $data, int $kilobytes) : bool
	{
		$uploaded = static::uploaded($field);
		if ( ! $uploaded) {
			return false;
		}
		$file = static::getFile($field);
		return $file['size'] <= ($kilobytes * 1024);
	}

	/**
	 * Validates file accepted MIME types.
	 *
	 * @param string $field
	 * @param array  $data
	 * @param string ...$allowed_types
	 *
	 * @return bool
	 */
	public static function mimeTypes(string $field, array $data, string ...$allowed_types) : bool
	{
		$uploaded = static::uploaded($field);
		if ( ! $uploaded) {
			return false;
		}
		$file = static::getFile($field);
		$mime_type = \mime_content_type($file['tmp_name']);
		return \in_array($mime_type, $allowed_types, true);
	}

	/**
	 * Validates file accepted extensions.
	 *
	 * @param string $field
	 * @param array  $data
	 * @param string ...$allowed_extensions
	 *
	 * @return bool
	 */
	public static function extensions(
		string $field,
		array $data,
		string ...$allowed_extensions
	) : bool {
		$uploaded = static::uploaded($field);
		if ( ! $uploaded) {
			return false;
		}
		$file = static::getFile($field);
		foreach ($allowed_extensions as $extension) {
			if (\str_ends_with($file['name'], '.' . $extension)) {
				return true;
			}
		}
		return false;
	}

	/**
	 * Validates file is an image.
	 *
	 * @param string $field
	 * @param array  $data
	 *
	 * @return bool
	 */
	public static function image(string $field, array $data = [])
	{
		$uploaded = static::uploaded($field);
		if ( ! $uploaded) {
			return false;
		}
		$file = static::getFile($field);
		$mime = \mime_content_type($file['tmp_name']);
		if (\str_starts_with('image/', $mime)) {
			return true;
		}
		return false;
	}

	/**
	 * Validates image max dimensions.
	 *
	 * @param string $field
	 * @param array  $data
	 * @param int    $width
	 * @param int    $height
	 *
	 * @return bool
	 */
	public static function maxDimensions(string $field, array $data, int $width, int $height)
	{
		$is_image = static::image($field);
		if ( ! $is_image) {
			return false;
		}
		$file = static::getFile($field);
		$sizes = \getimagesize($file['tmp_name']);
		return ! ($sizes === false || $sizes[0] > $width || $sizes[1] > $height);
	}
}