<?php 
   include("conectar.php"); 
$varmaxStreamViewers = $_POST['maxStreamViewers'];
  	
$xml = "
<Root>
	<Application>
		<!-- Uncomment to set application level timeout values
		<ApplicationTimeout>60000</ApplicationTimeout>
		<PingTimeout>12000</PingTimeout>
		<ValidationFrequency>8000</ValidationFrequency>
		<MaximumPendingWriteBytes>0</MaximumPendingWriteBytes>
		<MaximumSetBufferTime>60000</MaximumSetBufferTime>
		<MaximumStorageDirDepth>25</MaximumStorageDirDepth>
		-->
		<Connections>
			<AutoAccept>true</AutoAccept>
			<AllowDomains></AllowDomains>
		</Connections>
		<!--
			StorageDir path variables
			
			(SignoPesos){com.wowza.wms.AppHome} - Application home directory
			(SignoPesos){com.wowza.wms.ConfigHome} - Configuration home directory
			(SignoPesos){com.wowza.wms.context.VHost} - Virtual host name
			(SignoPesos){com.wowza.wms.context.VHostConfigHome} - Virtual host config directory
			(SignoPesos){com.wowza.wms.context.Application} - Application name
			(SignoPesos){com.wowza.wms.context.ApplicationInstance} - Application instance name
			
		-->
		<Streams>
			<StreamType>live</StreamType>
			<StorageDir>(SignoPesos){com.wowza.wms.context.VHostConfigHome}/content</StorageDir>
			<KeyDir>(SignoPesos){com.wowza.wms.context.VHostConfigHome}/keys</KeyDir>
			<!-- LiveStreamPacketizers (separate with commas): cupertinostreamingpacketizer, smoothstreamingpacketizer, cupertinostreamingrepeater, smoothstreamingrepeater -->
			<LiveStreamPacketizers>cupertinostreamingpacketizer, smoothstreamingpacketizer, sanjosestreamingpacketizer</LiveStreamPacketizers>	
			<!-- Properties defined here will override any properties defined in conf/Streams.xml for any streams types loaded by this application -->
			<Properties>
			</Properties>
		</Streams>
		<!-- HTTPStreamers (separate with commas): cupertinostreaming, smoothstreaming -->
		<HTTPStreamers>cupertinostreaming,smoothstreaming,sanjosestreaming</HTTPStreamers>			
		<SharedObjects>
			<StorageDir></StorageDir>
		</SharedObjects>
		<Client>
			<IdleFrequency>-1</IdleFrequency>
			<Access>
				<StreamReadAccess>*</StreamReadAccess>
				<StreamWriteAccess>*</StreamWriteAccess>
				<StreamAudioSampleAccess></StreamAudioSampleAccess>
				<StreamVideoSampleAccess></StreamVideoSampleAccess>
				<SharedObjectReadAccess>*</SharedObjectReadAccess>
				<SharedObjectWriteAccess>*</SharedObjectWriteAccess>
			</Access>
		</Client>
		<RTP>
			<!-- RTP/Authentication/[type]Methods defined in Authentication.xml. Default setup includes; none, basic, digest -->
			<Authentication>
				<PublishMethod>digest</PublishMethod>
				<PlayMethod>none</PlayMethod>
			</Authentication>
			<!-- RTP/AVSyncMethod. Valid values are: senderreport, systemclock, rtptimecode -->
			<AVSyncMethod>senderreport</AVSyncMethod>
			<MaxRTCPWaitTime>12000</MaxRTCPWaitTime>
			<!-- Properties defined here will override any properties defined in conf/RTP.xml for any depacketizers loaded by this application -->
			<Properties>
			</Properties>
		</RTP>
		<MediaCaster>
			<!-- Properties defined here will override any properties defined in conf/MediaCasters.xml for any MediaCasters loaded by this applications -->
			<Properties>
			</Properties>
		</MediaCaster>
		<MediaReader>
			<!-- Properties defined here will override any properties defined in conf/MediaReaders.xml for any MediaReaders loaded by this applications -->
			<Properties>
			</Properties>
		</MediaReader>
		<LiveStreamPacketizer>
			<!-- Properties defined here will override any properties defined in conf/LiveStreamPacketizers.xml for any LiveStreamPacketizers loaded by this applications -->
			<Properties>
			</Properties>
		</LiveStreamPacketizer>
		<HTTPStreamer>
			<!-- Properties defined here will override any properties defined in conf/HTTPStreamers.xml for any HTTPStreamer loaded by this applications -->
			<Properties>
			</Properties>
		</HTTPStreamer>
		<Repeater>
			<OriginURL></OriginURL>
			<QueryString><![CDATA[]]></QueryString>
		</Repeater> 
	<Modules>
		<Module>
			<Name>base</Name>
			<Description>Base</Description>
			<Class>com.wowza.wms.module.ModuleCore</Class>
		</Module>
		<Module>
			<Name>properties</Name>
			<Description>Properties</Description>
			<Class>com.wowza.wms.module.ModuleProperties</Class>
		</Module>
		<Module>
			<Name>logging</Name>
			<Description>Client Logging</Description>
			<Class>com.wowza.wms.module.ModuleClientLogging</Class>
		</Module>
		<Module>
			<Name>flvplayback</Name>
			<Description>FLVPlayback</Description>
			<Class>com.wowza.wms.module.ModuleFLVPlayback</Class>
		</Module>
		<Module>
			<Name>ModuleLimitStreamViewers</Name>
			<Description>ModuleLimitStreamViewers</Description>
			<Class>com.wowza.wms.plugin.collection.module.ModuleLimitStreamViewers</Class>
		</Module>
		<Module>
		<Name>ModuleRTMPAuthenticate</Name>
		<Description>ModuleRTMPAuthenticate</Description>
		<Class>com.wowza.wms.plugin.security.ModuleRTMPAuthenticate</Class>
		</Module>
		<Module>
			<Name>ModuleStreamNameAlias</Name>
			<Description>ModuleStreamNameAlias</Description>
			<Class>com.wowza.wms.plugin.streamnamealias.ModuleStreamNameAlias</Class>
		</Module>

		<Module>
			<Name>Pandora</Name>
			<Description>Modulo Estadisticas de Bronco</Description>
			<Class>com.cehis.wms.module.Pandora_Stats</Class>
		</Module>
	</Modules>
<!-- Properties defined here will be added to the IApplication.getProperties() and IApplicationInstance.getProperties() collections -->
	<Properties>
		<Property>
			<Name>aliasMapFileStream</Name>
			<Value>(SignoPesos){com.wowza.wms.context.VHostConfigHome}/conf/aliasmap.stream.txt</Value>
		</Property>
		<Property>
			<Name>broncoURL</Name>
			<Value>http://localhost/usuarios2/</Value>
		</Property>
		<Property>
			<Name>aliasMapFilePlay</Name>
			<Value>(SignoPesos){com.wowza.wms.context.VHostConfigHome}/conf/aliasmap.play.txt</Value>
		</Property>
		<Property>
			<Name>aliasMapPathDelimiter</Name>
			<Value>/</Value>
		</Property>
		<Property>
			<Name>aliasMapNameDelimiter</Name>
			<Value>=</Value>
		</Property>
		<Property>
			<Name>aliasMapDebug</Name>
			<Value>true</Value>
			<Type>Boolean</Type>
		</Property>
					<Property>
						<Name>maxStreamViewers</Name>
						<Value>$varmaxStreamViewers</Value>
						<Type>Integer</Type>
					</Property>
	</Properties>
	</Application>
</Root>";
	/*
	$xml = new SimpleXMLElement($xml);
	$xml = $xml->asXML();
	*/

	echo str_replace("(SignoPesos)", "$", $xml);

?> 
