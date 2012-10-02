<?PHP // $Id: question.php,v 1.9 2010/06/20 18:33:09 barias Exp $ 
      // question.php - created with Moodle 1.9.8 (Build: 20100325) (2007101580)


$string['adminreport'] = 'Informe sobre posibles problemas en su base de datos de preguntas.';
$string['broken'] = 'Éste es un enlace roto: apunta a un archivo inexistente.';
$string['byandon'] = 'por <em>$a->user</em> en <em>$a->time</em>';
$string['categorycurrent'] = 'Categoría actual';
$string['categorycurrentuse'] = 'Usar esta categoría';
$string['categorydoesnotexist'] = 'Esta categoría no existe';
$string['categorymoveto'] = 'Guardar en categoría';
$string['changepublishstatuscat'] = '<a href=\"$a->caturl\">La categoría \"$a->name\"</a> en curso \"$a->coursename\" cambiará su estatus de intercambio <strong>$a->changefrom a $a->changeto</strong>.';
$string['copy'] = 'Copiar de $a y cambiar los enlaces.';
$string['created'] = 'Creado';
$string['createdmodifiedheader'] = 'Creado / Último guardado';
$string['cwrqpfs'] = 'Preguntas aleatorias seleccionando preguntas de sub-categorías.';
$string['cwrqpfsinfo'] = '<p>Durante la actualización a Moodle 1.9 separaremos las categorías de pregunta en diferentes contextos. Algunas categorías y preguntas de su sitio verán su estatus de intercambio modificado. Esto es necesario en los raros casos en que una o más preguntas aleatorias se seleccionan a partir de una mezcla de categorías compartidas y no compartidas (como sucede en el caso de este sitio). Esto sucede cuando una pregunta aleatoria se ajusta para seleccionar a partir de subcategorías, y una o más subcategorías tienen diferente estatus de intercambio con la categoría padre en la que se crea la pregunta aleatoria.</p>
<p>Las siguientes categorías, de las cuales las preguntas aleatorias de las categorías superiores seleccionan las preguntas, tendrán -en la actualización a Moodle 1.9- su estatus de intercambio modificado al mismo estatus que la categoría que contiene la pregunta aleatoria. Las categorías que aparecen a continuación tendrán su estatus de intercambio modificado. Las preguntas afectadas continuarán funcionando en todos los cuestionarios existentes hasta que usted las elimine de tales cuestionarios.';
$string['cwrqpfsnoprob'] = 'No existen categorías en su sitio afectadas por la opción \'Preguntas aleatorias seleccionando preguntas de subcategorías\'.';
$string['defaultfor'] = 'Valor por defecto para $a';
$string['defaultinfofor'] = 'Categoría por defecto para preguntas compartidas en el contexto $a.';
$string['deletecoursecategorywithquestions'] = 'Hay preguntas en el banco de preguntas asociadas con esta categoría de curso. Si continúa, serán eliminadas. Quizás quiera trasladarlas primero, usando la interfaz del banco de preguntas.';
$string['donothing'] = 'No copie o mueva archivos ni cambie enlaces.';
$string['editingcategory'] = 'Edición de una categoría';
$string['editingquestion'] = 'Edición de una pregunta';
$string['editthiscategory'] = 'Editar esta categoría';
$string['erroraccessingcontext'] = 'No se puede acceder al contexto';
$string['errordeletingquestionsfromcategory'] = 'Error al eliminar preguntas de la categoría $a.';
$string['errorfilecannotbecopied'] = 'Error: no se puede copiar el archivo $a.';
$string['errorfilecannotbemoved'] = 'Error: no se puede mover el archivo $a.';
$string['errorfileschanged'] = 'Los archivos de error enlazados desde preguntas han cambiado desde que se ha mostrado el formulario.';
$string['errormanualgradeoutofrange'] = 'La calificación $a->grade no está entre 0 y $a->maxgrade para la pregunta $a->name. La puntuación y el comentario no se han guardado.';
$string['errormovingquestions'] = 'Error al trasladar preguntas con IDs $a.';
$string['errorprocessingresponses'] = 'Ha ocurrido un error al procesar sus respuestas.';
$string['errorsavingcomment'] = 'Error al guardar el comentario para la pregunta $a->name en la base de datos.';
$string['errorupdatingattempt'] = 'Error al actualizar el intento $a->id en la base de datos.';
$string['exportcategory'] = 'Exportar categoría';
$string['filesareacourse'] = 'área de archivos del curso';
$string['filesareasite'] = 'área de archivos del sitio';
$string['filestomove'] = '¿Mover / copiar archivos a $a?';
$string['fractionsnomax'] = 'Una de las respuestas debería tener una puntuación del 100%% de modo que sea posible conseguir la calificación máxima en esta pregunta.';
$string['getcategoryfromfile'] = 'Obtener categoría de archivo';
$string['getcontextfromfile'] = 'Obtener contexto de archivo';
$string['ignorebroken'] = 'Pasar por alto enlaces rotos';
$string['invalidcontextinhasanyquestions'] = 'Contexto no válido pasado a question_context_has_any_questions.';
$string['linkedfiledoesntexist'] = 'El archivo enlazado $a no existe';
$string['makechildof'] = 'Hacer Hijo de \'$a\'';
$string['maketoplevelitem'] = 'Mover al nivel superior';
$string['missingimportantcode'] = 'Este tipo de pregunta carece de un código importante: $a.';
$string['modified'] = 'Último guardado';
$string['move'] = 'Mover desde $a y cambiar enlaces.';
$string['movecategory'] = 'Mover categoría';
$string['movedquestionsandcategories'] = 'Trasladadas preguntas y categorías de preguntas de $a->oldplace a $a->newplace.';
$string['movelinksonly'] = 'Limitarse a cambiar el lugar al que apuntan los enlaces, no mover ni copiar archivos.';
$string['moveq'] = 'Mover pregunta(a)';
$string['moveqtoanothercontext'] = 'Mover pregunta a otro contexto.';
$string['movingcategory'] = 'Moviendo categoría';
$string['movingcategoryandfiles'] = '¿Está seguro de que quiere mover la categoría {$a->name} y todas sus categorías subordinadas al contexto de \"{$a->contextto}\"?<br /> Hemos detectado {$a->urlcount} archivos enlazados desde preguntas en {$a->fromareaname}; ¿desea copiarlas o moverlas a {$a->toareaname}?';
$string['movingcategorynofiles'] = '¿Está seguro de que quiere mover la categoría \"{$a->name}\" y todas sus categorías subordinadas al contexto para \"{$a->contextto}\"?';
$string['movingquestions'] = 'Moviendo preguntas y cualquier archivo';
$string['movingquestionsandfiles'] = '¿Está seguro de que quiere mover la(s) pregunta(s) {$a->questions} al contexto de <strong>\"{$a->tocontext}\"</strong>?<br /> Hemos detectado <strong>{$a->urlcount} archivos</strong> enlazados con esta(s) pregunta(s) en {$a->fromareaname}; ¿desea copiarlos o moverlos a {$a->toareaname}?';
$string['movingquestionsnofiles'] = '¿Está seguro de que quiere mover la(s) pregunta(s) {$a->questions} al contexto de <strong>\"{$a->tocontext}\"</strong>?<br /> No hay <strong>ningún archivo</strong> enlazado desde esta(s) pregunta(s) en {$a->fromareaname}.';
$string['needtochoosecat'] = 'Necesita elegir una categoría para mover esta pregunta o presionar \'cancelar\'.';
$string['nopermissionadd'] = 'No tiene permiso para agregar preguntas aquí.';
$string['nopermissionmove'] = 'Usted no tiene permiso para trasladar preguntas desde este lugar. Debe guardar la pregunta en esta categoría o guardarla como pregunta nueva.';
$string['noprobs'] = 'No se han encontrado problemas en su base de datos de preguntas.';
$string['notenoughdatatoeditaquestion'] = 'No se ha especificado ni el id de la pregunta ni el de la categoría y tipo de pregunta.';
$string['notenoughdatatomovequestions'] = 'Necesita proporcionar los ids de las preguntas que quiere mover.';
$string['permissionedit'] = 'Editar esta pregunta';
$string['permissionmove'] = 'Mover esta pregunta';
$string['permissionsaveasnew'] = 'Guardar esto como pregunta nueva';
$string['permissionto'] = 'Usted tiene permiso para:';
$string['published'] = 'publicado';
$string['questionaffected'] = '<a href=\"$a->qurl\">La pregunta \"$a->name\" ($a->qtype)</a> está en esta categoría, pero está también siendo usada en <a href=\"$a->qurl\">el cuestionario \"$a->quizname\"</a> en otro curso \"$a->coursename\".';
$string['questionbank'] = 'Banco de preguntas';
$string['questioncategory'] = 'Categoría de pregunta';
$string['questioncatsfor'] = 'Categorías de pregunta para \'$a\'';
$string['questiondoesnotexist'] = 'Esta pregunta no existe.';
$string['questionsmovedto'] = 'Preguntas aún en uso trasladadas a \"$a\" en la categoría de curso padre.';
$string['questionsrescuedfrom'] = 'Preguntas guardadas del contexto $a.';
$string['questionsrescuedfrominfo'] = 'Estas preguntas (alguna de las cuales puede estar oculta) se han guardado cuando el contexto $a fue eliminado debido a que aún están siendo utilizadas por algún cuestionario o por otras actividades.';
$string['questionuse'] = 'Usar pregunta en esta actividad';
$string['shareincontext'] = 'Compartir en contexto para $a';
$string['tofilecategory'] = 'Escribir categoría a archivo';
$string['tofilecontext'] = 'Escribir contexto a archivo';
$string['unknown'] = 'Desconocido';
$string['unknownquestiontype'] = 'Tipo de pregunta desconocido: $a.';
$string['unpublished'] = 'sin publicar';
$string['upgradeproblemcategoryloop'] = 'Se ha detectado un problema al actualizar las categorías de preguntas. Hay un bucle (\'loop\') en el árbol de categorías. Las IDs de categorías afectadas son $a.';
$string['upgradeproblemcouldnotupdatecategory'] = 'No se ha podido actualizar la categoría de pregunta $a->name ($a->id).';
$string['upgradeproblemunknowncategory'] = 'Se ha detectado un problema al actualizar las categorías de preguntas. La catogoría $a->id se refiere al padre $a->parent, que no existe. Se ha cambiado el padre para solucionar el problema.';
$string['yourfileshoulddownload'] = 'Su archivo de exportación debería comenzar a descargarse en seguida. De no ser así, por favor <a href=\"$a\">haga clic aquí</a>. Se ha cambiado el padre para solucionar el problema.';

?>
