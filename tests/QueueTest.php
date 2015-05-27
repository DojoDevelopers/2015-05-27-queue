<?php

namespace Dojo\Tests;

class QueueTest extends \PHPUnit_Framework_TestCase
{
	private static $fila;

	public static function setUpBeforeClass()
	{
		self::$fila = new \Dojo\Queue;
	}

	public static function tearDownAfterClass() 
	{
		self::$fila = null;
	}

	public function testInstanceOfFirstClass()
	{
		$this->assertInstanceOf('Dojo\Queue', self::$fila);
	}

	/**
	 * @depends testInstanceOfFirstClass
	 */
	public function testInserirNaFilaVazia() {
		$dados = array(
			'id' => 10661,
			'nome' => 'Pedro',
			'cargo' => 'papa'
		);

		$this->assertTrue(self::$fila->adicionar($dados));
	}

	/**
	 * @depends testInserirNaFilaVazia
	 */
	public function testRemoverSeContemDadosRetornaTrue() 
	{
		$dados = array(
			'id' => 10661,
			'nome' => 'Pedro',
			'cargo' => 'papa'
		);

		$this->assertEquals($dados, self::$fila->remover());
	}

	/**
	 * @depends testRemoverSeContemDadosRetornaTrue
	 */
	public function testRemoverSeNaoContemDadosRetornaFalse() {
		$this->assertFalse(self::$fila->remover());
	}

	/**
	 * @depends testRemoverSeNaoContemDadosRetornaFalse
	 */
	public function testInserir2CarasNaFila() {
		$dados = array (
			'id' => 10115,
			'nome' => 'Andre',
			'cargo' => 'bispo'
		);

		$dados2 = array (
			'id' => 11604,
			'nome' => 'Tomé',
			'desc' => 'Só acreditava no que via'
		);

		$this->assertTrue(self::$fila->adicionar($dados));
		$this->assertTrue(self::$fila->adicionar($dados2));
	}

	/**
	 * @depends testInserir2CarasNaFila
	 */
	public function testremove2CarasDaLista()
	{
		$dados = array (
			'id' => 10115,
			'nome' => 'Andre',
			'cargo' => 'bispo'
		);

		$dados2 = array (
			'id' => 11604,
			'nome' => 'Tomé',
			'desc' => 'Só acreditava no que via'
		);

		$this->assertEquals($dados, self::$fila->remover());
		$this->assertEquals($dados2, self::$fila->remover());
	}

}
