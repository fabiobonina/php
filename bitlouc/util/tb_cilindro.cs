using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Bitlouc
{
    #region Tb_cilindro
    public class Tb_cilindro
    {
        #region Member Variables
        protected int _id;
        protected string _serie;
        protected string _fabricante;
        protected int _capacidade;
        protected unknown _dt_fabric;
        protected unknown _dt_validade;
        protected unknown _tara_inicial;
        protected unknown _tara_atual;
        protected unknown _condenado;
        protected int _proprietario_id;
        protected string _grupo;
        protected int _loja_id;
        protected string _loja_nick;
        protected int _local_id;
        protected string _cod_barras;
        protected unknown _dt_cadastro;
        protected unknown _dt_revisado;
        protected unknown _status;
        protected unknown _ativo;
        protected unknown _dt_condenado;
        #endregion
        #region Constructors
        public Tb_cilindro() { }
        public Tb_cilindro(string serie, string fabricante, int capacidade, unknown dt_fabric, unknown dt_validade, unknown tara_inicial, unknown tara_atual, unknown condenado, int proprietario_id, string grupo, int loja_id, string loja_nick, int local_id, string cod_barras, unknown dt_cadastro, unknown dt_revisado, unknown status, unknown ativo, unknown dt_condenado)
        {
            this._serie=serie;
            this._fabricante=fabricante;
            this._capacidade=capacidade;
            this._dt_fabric=dt_fabric;
            this._dt_validade=dt_validade;
            this._tara_inicial=tara_inicial;
            this._tara_atual=tara_atual;
            this._condenado=condenado;
            this._proprietario_id=proprietario_id;
            this._grupo=grupo;
            this._loja_id=loja_id;
            this._loja_nick=loja_nick;
            this._local_id=local_id;
            this._cod_barras=cod_barras;
            this._dt_cadastro=dt_cadastro;
            this._dt_revisado=dt_revisado;
            this._status=status;
            this._ativo=ativo;
            this._dt_condenado=dt_condenado;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Serie
        {
            get {return _serie;}
            set {_serie=value;}
        }
        public virtual string Fabricante
        {
            get {return _fabricante;}
            set {_fabricante=value;}
        }
        public virtual int Capacidade
        {
            get {return _capacidade;}
            set {_capacidade=value;}
        }
        public virtual unknown Dt_fabric
        {
            get {return _dt_fabric;}
            set {_dt_fabric=value;}
        }
        public virtual unknown Dt_validade
        {
            get {return _dt_validade;}
            set {_dt_validade=value;}
        }
        public virtual unknown Tara_inicial
        {
            get {return _tara_inicial;}
            set {_tara_inicial=value;}
        }
        public virtual unknown Tara_atual
        {
            get {return _tara_atual;}
            set {_tara_atual=value;}
        }
        public virtual unknown Condenado
        {
            get {return _condenado;}
            set {_condenado=value;}
        }
        public virtual int Proprietario_id
        {
            get {return _proprietario_id;}
            set {_proprietario_id=value;}
        }
        public virtual string Grupo
        {
            get {return _grupo;}
            set {_grupo=value;}
        }
        public virtual int Loja_id
        {
            get {return _loja_id;}
            set {_loja_id=value;}
        }
        public virtual string Loja_nick
        {
            get {return _loja_nick;}
            set {_loja_nick=value;}
        }
        public virtual int Local_id
        {
            get {return _local_id;}
            set {_local_id=value;}
        }
        public virtual string Cod_barras
        {
            get {return _cod_barras;}
            set {_cod_barras=value;}
        }
        public virtual unknown Dt_cadastro
        {
            get {return _dt_cadastro;}
            set {_dt_cadastro=value;}
        }
        public virtual unknown Dt_revisado
        {
            get {return _dt_revisado;}
            set {_dt_revisado=value;}
        }
        public virtual unknown Status
        {
            get {return _status;}
            set {_status=value;}
        }
        public virtual unknown Ativo
        {
            get {return _ativo;}
            set {_ativo=value;}
        }
        public virtual unknown Dt_condenado
        {
            get {return _dt_condenado;}
            set {_dt_condenado=value;}
        }
        #endregion
    }
    #endregion
}